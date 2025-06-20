

let canvas;
let bgImage;
let progress = -1;
let timer = 0;
let challenges = [];
let challenge = 
  {
    "result": {
      "dif": 1,
      "points": []
    },
    "img": "img/challenge/LROP.png",
    "start": [
        0,0
    ],
    "dest": [
      0,0
    ],
    "positions": [],
    "line1": "Loading",
    "line2": "Loading",
    "line3": "Loading",
    "line4": "Loading",
    "id": 999
};

function setup() {
  const container = document.getElementById('canvas-container');
  // canvas = createCanvas(container.offsetWidth, container.offsetHeight);
  canvas = createCanvas(3535, 2500);
  canvas.parent('canvas-container');

  scale(100);


}

function mousePressed() {
  if (
    mouseButton == LEFT &&
    mouseX >= 0 &&
    mouseX <= width &&
    mouseY >= 0 &&
    mouseY <= height
  ) {
    challenge["result"]["points"].push([
      mouseX,
      mouseY
    ]);
  }

}

function draw() {
  if (bgImage) {
    background(bgImage);
  } else {
    background(255); // white background
  }

  if(challenge["result"]["dif"] <= 1)
  {
    stroke(0, 255, 255);
    fill(0,0,0,0);
    strokeWeight(10);
    beginShape();
    for(let i of challenge["positions"])
    {
      vertex(i[0], i[1])
    }
    endShape();
  }

  stroke(255, 100, 100, 100);
  fill(0,0,0,0);
  strokeWeight(50);
  beginShape();
  if(challenge["result"]["points"].length == 1)
    vertex(challenge["result"]["points"][0][0], challenge["result"]["points"][0][1]);
  for(let i of challenge["result"]["points"])
  {
    vertex(i[0], i[1])
  }
  endShape();

  if(challenge["result"]["dif"] <= 2)
  {
    stroke(255, 0, 0);
    strokeWeight(10);
    circle(challenge["start"][0], challenge["start"][1], 100)
    stroke(0, 0, 255);
    circle(challenge["dest"][0], challenge["dest"][1],100)
  }
}

function do_undo() {
  if(challenge["result"]["points"].length > 0)
  {
    challenge["result"]["points"].pop();
  }
}

function keyPressed() {
  if (keyIsDown(CONTROL)) {
    //Z key
    if (keyIsDown(90)) {
      do_undo()
    }
    if (keyIsDown(13))
    {
      submit_challenge();
    }
  }
  // if(keyIsDown(65)) // A
  // {
  //   start = [mouseX, mouseY]
  // }
  // if(keyIsDown(90)) // Z
  // {
  //   dest = [mouseX, mouseY]
  // }
}

var imageUrl;

// This function can be called from outside to reload canvas with a new background
function put_challenges() {
  fetch('challenges.json')
    .then(response => response.json())
    .then(data => {
      challenges = [];
      for(let ch of data)
      {
        for(let dif = 1; dif <= 3; dif++)
        {
          let obj = JSON.parse(JSON.stringify(ch));
          obj["result"] = {}
          obj["result"]["dif"] = dif;
          obj["result"]["points"] = [];
          challenges.push(obj)
        }
      }
      challenges = challenges.sort( () => Math.random() - 0.5);
      challenges = challenges.splice(0,ch_total);
      // challenge = challenges[0];
      load_new_canvas();
    })
    .catch(err => {
      console.error('Error loading new canvas:', err);
    });
}

// This function can be called from outside to reload canvas with a new background
function load_new_canvas() {
  progress += 1;
  challenge = challenges[progress]
  imageUrl = challenge.img;
  loadImage(imageUrl, img => {
    document.getElementById("prog").innerHTML = progress;

    startCountUpTimer();

    document.getElementById("instruction-1").innerHTML = challenge.line1;
    document.getElementById("instruction-2").innerHTML = challenge.line2;
    document.getElementById("instruction-3").innerHTML = challenge.line3;
    document.getElementById("instruction-4").innerHTML = challenge.line4;
    
    bgImage = img;
    redrawCanvasWithImage();

  });
}

let startTime = null;
let timerInterval = null;

function submit_challenge()
{
  challenge.result.time = document.getElementById('timer').textContent;
  if(progress + 1 < ch_total)
  {
    load_new_canvas();
  }
  else {
    
    document.getElementById("btn_submit").href = "#";
    document.getElementById("btn_submit").innerHTML = "Sending";
    send_results();
  }
}

function send_results() {
  syncChallengesAndOpenForm(ENDPOINT_URL, GOOGLE_FORM_URL, ENTRY_ID);
}

function startCountUpTimer() {
  startTime = Date.now();
  
  // Clear any existing interval
  if (timerInterval) clearInterval(timerInterval);

  timerInterval = setInterval(() => {
    const elapsed = Date.now() - startTime;

    const totalSeconds = elapsed / 1000;
    const minutes = Math.floor(totalSeconds / 60);
    const seconds = Math.floor(totalSeconds % 60);

    const formattedTime = 
      `${String(minutes).padStart(2, '0')}:` +
      `${String(seconds).padStart(2, '0')}`;

    document.getElementById('timer').textContent = formattedTime;
  }, 100);
}

function redrawCanvasWithImage() {
  background(bgImage);
}

window.addEventListener('load', () => {
  // Ensure p5 setup is done before calling this
  document.getElementById("ch_total").innerHTML = ch_total;
  put_challenges();
});

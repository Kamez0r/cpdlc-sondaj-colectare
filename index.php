<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap One Page with Dark Mode & Form</title>
  <!-- In <head> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      padding-top: 3rem;
      padding-bottom: 3rem;
      transition: background-color 0.3s, color 0.3s;
    }
    .theme-switcher {
      position: fixed;
      top: 1rem;
      right: 1rem;
      z-index: 1030;
    }
    .fb-cont {
        /* min-width:90%; */
    }

    .start {
        color:red;
    }

    .dest {
        color:#66f;
    }

    .route_path {
        color:aqua;
    }
  </style>
  <!-- Before </body> -->

</head>
<body>
  <div class="container fb-cont">
    <!-- Theme switcher -->
    <div class="theme-switcher form-check form-switch">
      <input class="form-check-input" type="checkbox" id="darkModeToggle" />
      <label class="form-check-label" for="darkModeToggle">Dark Mode</label>
    </div>

    <h1 class="mt-4">Thank you for participating!</h1>

    <p>You’ll be shown a series of charts along with taxi instructions. Your task is to <strong>draw the correct taxi route</strong> according to those instructions.</p>

    <!-- Chart Example Image -->
    <!-- <a href="path_to_image" class="glightbox" data-glightbox><img src="path_to_image" alt="Chart Example" class="img-fluid my-3"></a> -->

    <h2 class="mt-5">Difficulty Levels</h2>

    <div class="row text-center mt-3">
    <!-- No Hints -->
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">⭐ No Hints</h5>
            <p class="card-text">
            You will receive only the chart and the instructions.<br>
            Identify the <span class = "start">start</span> and <span class="dest">destination</span>, then draw the correct <span class="route_path">path</span>.
            </p>
            <a href="img/instr/no_hints.png" class="glightbox" data-glightbox><img src="img/instr/no_hints.png" class="img-fluid mt-2" alt="No Hints"></a>
        </div>
        </div>
    </div>

    <!-- Basic Hints -->
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">⭐⭐ Basic Hints</h5>
            <p class="card-text">
            <span class = "start">start</span>  and <span class="dest">destination</span> will be marked.<br>
            You draw the correct route between them.
            </p>
            <a href="img/instr/basic_hints.png" class="glightbox" data-glightbox><img src="img/instr/basic_hints.png" class="img-fluid mt-2" alt="Basic Hints"></a>
        </div>
        </div>
    </div>

    <!-- Full Hints -->
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">⭐⭐⭐ Full Hints</h5>
            <p class="card-text">
            Chart, instructions, <span class = "start">start</span> , <span class="dest">destination</span>, and the <span class="route_path">route</span> are shown.<br>
            Just trace over the given <span class="route_path">path</span>.
            </p>
            <a href="img/instr/full_hints.png" class="glightbox" data-glightbox><img src="img/instr/full_hints.png" class="img-fluid mt-2" alt="Full Hints"></a>
        </div>
        </div>
    </div>
    </div>


    <h2 class="mt-5">Drawing Instructions</h2>

    <div class="row text-center mt-3">
    <!-- Add Points -->
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">➕ Add Points</h5>
            <p class="card-text">
            Click on the chart to add points and build your route.
            </p>
            <a href="img/instr/clicks.gif" class="glightbox" data-glightbox><img src="img/instr/clicks.gif" class="img-fluid mt-2" alt="Add Points"></a>
        </div>
        </div>
    </div>

    <!-- Undo -->
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">↩️ Undo</h5>
            <p class="card-text">
            Press <kbd>Ctrl</kbd> + <kbd>Z</kbd> or click the Undo button to remove the last point.
            </p>
            <a href="img/instr/undo.png" class="glightbox" data-glightbox><img src="img/instr/undo.png" class="img-fluid mt-2" alt="Undo"></a>
        </div>
        </div>
    </div>

    <!-- Submit -->
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">✅ Submit</h5>
            <p class="card-text">
            Press <kbd>Ctrl</kbd> + <kbd>Enter</kbd> or click Submit to confirm your route and move on. You can’t go back once submitted.
            </p>
            <a href="img/instr/submit.png" class="glightbox" data-glightbox><img src="img/instr/submit.png" class="img-fluid mt-2" alt="Submit"></a>
        </div>
        </div>
    </div>
    </div>

    <div class="alert alert-info mt-4 text-center" role="alert">
  <strong>Note:</strong> If you manually click the <em>“Submit”</em> or <em>“Undo”</em> buttons, you may notice a small visual glitch. Don’t worry — that part of the line will not be registered or stored.

  <!-- Replace 'path_to_glitch_image' with your actual image path -->
  <div class="mt-3">
    <a href="img/instr/glitch.gif" class="glightbox" data-glightbox><img src="img/instr/glitch.gif" class="img-fluid rounded shadow-sm" alt="Visual glitch example" style="max-height: 50vh;"></a>
  </div>
</div>



    <p><strong>Note:</strong> Once you submit a task, you can't return to it. Each task is timed, and your drawn path will be compared to the correct one for accuracy.</p>

    <h2 class="mt-5">Practice & Submission</h2>
    <p>You can do a practice run with fewer tasks to get used to the interface—just make sure not to submit the form at the end.</p>

    <p>When you're ready, complete the answers on the Google Forms page and press submit.</p>
    <a href="img/instr/form.png" class="glightbox" data-glightbox><img src="img/instr/form.png" alt="Google Forms Example" class="img-fluid my-3" style="max-height:60vh;"></a>

    <p class="mt-4">Thanks again for your help! Doing multiple tasks in one run helps us a lot. Feel free to repeat the challenge later—<strong>every submission counts toward our analysis</strong>.</p>


    <div class="row">
        
    <div class="col-md-2"></div>
    <!-- Form at the bottom -->
    <div class="col-md-8">
    <form action="challenge.php" method="GET" class="mt-5" >
    <label for="numberInput" class="form-label">Select a number of challenges:</label>
    <div class="d-flex align-items-center gap-3">
        <input 
        type="range" 
        class="form-range" 
        id="numberInput" 
        name="number"
        min="5" 
        max="80" 
        step="5" 
        value="40" 
        required
        />
        <output id="numberOutput">40</output>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Start challenge</button>
    </form>
    </div>

    <div class="col-md-2"></div>
    </div>

<script>
  const slider = document.getElementById('numberInput');
  const output = document.getElementById('numberOutput');

  output.textContent = slider.value;

  slider.addEventListener('input', () => {
    output.textContent = slider.value;
  });
</script>



  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Dark mode toggle
    const toggle = document.getElementById('darkModeToggle');
    const htmlTag = document.documentElement;

    // Load saved preference
    if (localStorage.getItem('theme') === 'dark') {
      toggle.checked = true;
      htmlTag.setAttribute('data-bs-theme', 'dark');
    }

    toggle.addEventListener('change', () => {
      if (toggle.checked) {
        htmlTag.setAttribute('data-bs-theme', 'dark');
        localStorage.setItem('theme', 'dark');
      } else {
        htmlTag.setAttribute('data-bs-theme', 'light');
        localStorage.setItem('theme', 'light');
      }
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
  const lightbox = GLightbox({
    selector: '.glightbox'
  });
</script>
</body>
</html>

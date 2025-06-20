/**
 * Sends `challenges` to your own endpoint and then opens a Google Form
 * with the returned code pre-filled in a chosen field.
 *
 * @param {string} endpointUrl   URL of your server script (e.g. "submit_result.php")
 * @param {string} formUrl       Public “viewform” URL of the Google Form
 * @param {string|number} entryId Numeric field ID in the form (after "entry.")
 */
async function syncChallengesAndOpenForm(endpointUrl,
    formUrl,
    entryId) {
try {
// 1️⃣  Send the data to your server
const formData = new FormData();
formData.append('result', JSON.stringify(challenges));

const resp = await fetch(endpointUrl, {
  method: 'POST',
  body: formData
});

if (!resp.ok) {
throw new Error(`Server responded with ${resp.status}`);
}

// 2️⃣  Read the identifier returned by the server
const code = await resp.text();         // assume plain text
if (!code) {
throw new Error('Empty response body; no code received.');
}

// 3️⃣  Build a pre-filled Google Form URL
const prefillUrl =
`${formUrl}?usp=pp_url&entry.${entryId}=${encodeURIComponent(code)}`;

// 4️⃣  Open the form so the user can continue
// window.open(prefillUrl, '_blank');
location.href = prefillUrl;

} catch (err) {
console.error('syncChallengesAndOpenForm failed:', err);
alert('Oops! The data could not be submitted. Please try again.');
}
}

/* -------------------  USAGE  ------------------- */

// Your PHP endpoint (same origin or configured with CORS to allow POSTs)
const ENDPOINT_URL = 'submit_result.php';


// Call it whenever you’re ready
// syncChallengesAndOpenForm(ENDPOINT_URL, GOOGLE_FORM_URL, ENTRY_ID);

  /* ------------------  USAGE  ------------------ */
  
  // 1. Copy the “Send → Link → Copy” URL of your form (it ends in /viewform)
  const GOOGLE_FORM_URL = 'https://docs.google.com/forms/d/e/1FAIpQLScPt6H2vHeViRkh5At7pkVYvXik_CUeuVpJiJMXVnmO534l3Q/viewform';
  
  // 2. Find the numeric field ID:
  //    In Google Forms choose “Get pre-filled link”, type anything, press “Get link”,
  //    copy the link and look for the number after “entry.” (e.g. 1234567890).
  const ENTRY_ID = '2135164592';
  
  
import { secretParagraph, secretButton } from './dom-loader';

var showSecret = false;

secretButton.addEventListener('click', toggleSecretState);
updateSecretParagraph();

function toggleSecretState() {
  showSecret = !showSecret;
  updateSecretParagraph();
  updateSecretButton();
}

function updateSecretButton() {
  if (showSecret) {
    secretButton.textContext = 'Hide the Secret';
  }
  else {
    secretButton.textContext = 'Show the Secret';
  }
}


function updateSecretParagraph() {
  if (showSecret) {
    secretParagraph.style.display = 'block';
  }
  else {
    secretParagraph.style.display = 'none';
  }
}

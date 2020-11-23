function copyFunction() {
  /* Get the text field */
  const refer = document.querySelector(".referral");
  const copyText = refer.innerHTML;

  let input = document.createElement("input");
  input.setAttribute("value", copyText);
  document.body.appendChild(input);

  /* Select the text field */
  input.select();
  input.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  input.parentNode.removeChild(input);

  /* Alert the copied text */
  // alert("Copied the text: " + copyText.value);
  const span = document.querySelector(".copy-text");
  span.innerHTML = "Copied";
}

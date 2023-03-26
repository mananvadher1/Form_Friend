const form = document.getElementById('followup-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  const formData = new FormData(form);
  const data = {};
  for (const [key, value] of formData.entries()) {
    data[key] = value;
  }
  console.log(data);
  // You can send the data to the server or do any other action with it
  form.reset();
});

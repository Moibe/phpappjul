<html>


<script>
function handleSubmit(event) {
event.preventDefault();
const data = new FormData(event.target);
const value = data.get('email');
console.log({ value });
}
const form = document.querySelector('form');
form.addEventListener('submit', handleSubmit);

</script>


  <body>
  <form>
<label for="email">Email</label>
<input type="email" name="email" id="email" />
<button type="submit">Submit</button>
</form>
  </body>
</html>
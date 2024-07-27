<h1>The difference between Put & Patch:</h1>
<dl>
  <dt>Put :</dt>
  <dd>- PUT is used for updating all the data (all fields).</dd>
  <dd></dd>
  <dt>Patch :</dt>
  <dd>- PATCH is used for updating partial data (a few fields), and other parts of the resource are updated that you haven't provided(timestamps).</dd>
</dl>
   <p>Example: if i have an account settings page and i want to change only the username but not the email & password. For that, i'll use a PATCH request. Otherwise if i have a form and i want to change all the data in this form i'll use a Put request.</p>
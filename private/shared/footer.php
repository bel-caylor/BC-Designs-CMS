<div id="saveFooter">
  <label for="password">Database Password:</label>
  <input type="text" id="password" size=10>
  <button onclick="clickSaveChanges()" id="saveChanges">Save Changes</button>
  <button onclick="clickCancelChanges()" id="cancelChanges">Cancel Changes</button>
</div>

<footer class="page_footer">
  <div>&copy; <?php echo date('Y') . ' ' .$Company; ?></div>
  <!-- <div id="saveFooter">
    <!-- <label for="password">Password:</label>
    <input type="text" id="password" size=10>
    <button onclick="clickSaveChanges()" id="saveChanges">Save Changes</button> -->
  </div> -->
</footer>
<script src="index.js">
</script>
</body>

</html>

<?php
  dbDisConnect($db);
 ?>

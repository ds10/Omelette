<?php /* Smarty version 2.6.21-dev, created on 2013-04-12 12:29:52
         compiled from ajax-checker.tpl */ ?>
<?php echo '
<script>

var currentTS = \''; ?>
<?php echo $this->_tpl_vars['forceTime']; ?>
<?php echo '\';


/*
function checkForce() {
    $.ajax({
      url: \'lib/ajax-forcetime.php\',
      timeout: 2000, // don\'t wait too long
      success: function(data) {
        if (currentTS < data.ts) {
            location.reload();
        }
    }});
}
</script>
*/
'; ?>
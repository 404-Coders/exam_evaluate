<?php
    $simple = 'demo text string';
    $complex = array('demo', 'text', array('foo', 'bar'));
?>
<script type="text/javascript">
    var simple = '<?php echo $simple; ?>';
    console.log(simple);
    var complex = <?php echo json_encode($complex); ?>;
    console.log(complex);
</script>


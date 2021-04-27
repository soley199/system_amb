$(document).ready(function(){
    $("input[name=atencionCliente]").change(function () {   
      // alert($(this).val());
      if ($(this).val() == "SI") {
        $('input[name=optionsRadios65]').attr("disabled", false);
        $('input[name=optionsRadios66]').attr("disabled", false);
        $('input[name=optionsRadios67]').attr("disabled", false);
        $('input[name=optionsRadios68]').attr("disabled", false);
      } else {
        $('input[name=optionsRadios65]').attr("disabled", true);
        $('input[name=optionsRadios66]').attr("disabled", true);
        $('input[name=optionsRadios67]').attr("disabled", true);
        $('input[name=optionsRadios68]').attr("disabled", true);
      }
      });
    $("input[name=soyJefe]").change(function () {
      // alert($(this).val());
       if ($(this).val() == "SI") {
        $('input[name=optionsRadios69]').attr("disabled", false);
        $('input[name=optionsRadios70]').attr("disabled", false);
        $('input[name=optionsRadios71]').attr("disabled", false);
        $('input[name=optionsRadios72]').attr("disabled", false);
      } else {
        $('input[name=optionsRadios69]').attr("disabled", true);
        $('input[name=optionsRadios70]').attr("disabled", true);
        $('input[name=optionsRadios71]').attr("disabled", true);
        $('input[name=optionsRadios72]').attr("disabled", true);
      }
      });
    });
$(document).on('click', '#btnEnviarEncuesta', function() {

	// if($("#encuesta input[name='optionsRadios1']:radio").is(':checked')){ 
	// 			alert("Seleccionado");
	// 			$("#formulario").submit();  
	// } 
	if ($('input:radio[name=optionsRadios1]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 1 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios2]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 2 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios3]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 3 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios4]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 4 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios5]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 5 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios6]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 6 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios7]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 7 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios8]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 8 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios9]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 9 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios10]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 10 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios11]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 11 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios12]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 12 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios13]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 13 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios14]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 14 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios15]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 15 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios16]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 16 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios17]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 17 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios18]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 18 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios19]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 19 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios20]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 20 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios21]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 21 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios22]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 22 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios23]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 23 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios24]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 24 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios25]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 25 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios26]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 26 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios27]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 27 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios28]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 28 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios29]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 29 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios30]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 30 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios31]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 31 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios32]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 32 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios33]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 33 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios34]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 34 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios35]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 35 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios36]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 36 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios37]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 37 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios38]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 38 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios39]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 39 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios40]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 40 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios41]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 41 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios42]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 42 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios43]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 43 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios44]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 44 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios45]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 45 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios46]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 46 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios47]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 47 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios48]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 48 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios49]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 49 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios50]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 50 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios51]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 51 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios52]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 52 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios53]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 53 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios54]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 54 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios55]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 55 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios56]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 56 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios57]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 57 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios58]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 58 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios59]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 59 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios60]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 60 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios61]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 61 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios62]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 62 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios63]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 63 Esta Bacia');
    return false;
  } else if ($('input:radio[name=optionsRadios64]:checked').val() == null) {
    // Si no se cumple la condicion...
    alert('[ERROR] La pregunta 64 Esta Bacia');
    return false;
  } else{
  	$("#encuesta").submit();
  }
});
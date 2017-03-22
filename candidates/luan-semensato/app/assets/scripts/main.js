(function (window, $) {

  'use strict';

  $(document).ready(function(){
    // Without click
    $(document).on('click', '.trigger-without-click', function (event) {
      event.preventDefault();
    });

    /*
    -------------------------
    LOGIN VALIDATION
    -------------------------
    */
    var fieldInput = $(".form-field input");
    var inputOrder = $("input[name='order']");
    var inputUser  = $("input[name='user']");

    fieldInput.on('focus', function() {
      $(this).parents('.form-field').addClass('form-field-hover');
    });

    fieldInput.on('focusout', function() {
      if($(this).val() == ""){
        $(this).parents('.form-field').removeClass('form-field-hover').removeClass('form-field-success').addClass('form-field-error');
      }
    });

    fieldInput.on('input', function() {
      $(this).parents('.form-field').removeClass('form-field-error');

      // success
      if(inputOrder.val().length > 1){
        inputOrder.parents('.form-field').addClass('form-field-success');
      } else {
        inputOrder.parents('.form-field').removeClass('form-field-success');
      }

      if(inputUser.val().length > 13){
        inputUser.parents('.form-field').addClass('form-field-success');
      } else {
        inputUser.parents('.form-field').removeClass('form-field-success');
      }
    });

    // onclick
    $(document).on('click', '.trigger-form-login', function (event) {
      var ok = true;
      var status;
      var inputOrderValidation = inputOrder.parents('.form-field');
      var inputUserValidation  = inputUser.parents('.form-field');

      inputOrderValidation.removeClass('form-field-error');
      inputUserValidation.removeClass('form-field-error');

      if(inputOrder.val().length <= 1){
        ok = false;
        inputOrderValidation.addClass('form-field-error');
      }

      if(inputUser.val().length <= 13){
        ok = false;
        inputUserValidation.addClass('form-field-error');
      }

      if (ok) {
        status = 'ok';
        console.log('success');

        inputOrderValidation.addClass('form-field-success');
        inputUserValidation.addClass('form-field-success');

        // $.ajax({
        //   type: "POST",
        //   url: ...,
        //   data: { order: inputOrder.val(), user: inputUser.val() }
        // });
      } else {
        status = 'error';
      }
    });

    // CPF / CNPJ
    $('.trigger-mask-cpf-cnpj').on('keypress', function(e) {
      mask(this, cpfCnpj);
    });

    // OPEN LIST
    $(document).on('click', '.trigger-open-list-itens', function (event) {
      var list = $('.list-itens');

      if(list.hasClass('closed')){
        list.removeClass('closed').slideToggle();
        $(this).addClass('icon-arrow-up');
        
      } else {
        list.addClass('closed').slideToggle();
        $(this).removeClass('icon-arrow-up');
      }

      event.preventDefault();
    });

    // TOOLTIP
    $(document).on('click', '.trigger-tooltip', function (event) {
      event.preventDefault();
    });

    $('.trigger-tooltip').each(function(){
      var text = $(this).data('tooltip');
      $(this).addClass('c-tooltip').html('<span>' + text + '</span>');
    });

  });

})(window, jQuery);


// Máscara CPF / CNPJ
function mask(o,f){
  v_obj=o
  v_fun=f
  setTimeout('execmask()',1)
}
 
function execmask(){
  v_obj.value=v_fun(v_obj.value)
}
 
function cpfCnpj(v){
  //Remove tudo o que não é dígito
  v=v.replace(/\D/g,"")

  if (v.length <= 14) {
    //CPF
    //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")

    //Coloca um ponto entre o terceiro e o quarto dígitos
    //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d)/,"$1.$2")

    //Coloca um hífen entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
  } else {
    //CNPJ
    //Coloca ponto entre o segundo e o terceiro dígitos
    v=v.replace(/^(\d{2})(\d)/,"$1.$2")

    //Coloca ponto entre o quinto e o sexto dígitos
    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")

    //Coloca uma barra entre o oitavo e o nono dígitos
    v=v.replace(/\.(\d{3})(\d)/,".$1/$2")

    //Coloca um hífen depois do bloco de quatro dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")
  }

  return v
}
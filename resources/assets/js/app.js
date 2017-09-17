
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

var searchBusinessForm  = document.getElementById('searchBusinessForm');
var businessQueryField  = document.getElementById('businessQuery');
var submitSearchButton  = document.getElementById('submitSearchButton');
var emptyQuerySpan      = document.getElementById('emptyQuerySpan');
var businessQueryGroup  = document.getElementById('businessQueryGroup');

var b = $('#select-categories').select2();

function queryMessageValidate(show){
  if(show)
  {
    emptyQuerySpan.classList.remove('hidden');
    businessQueryGroup.classList.add('has-error');
    submitSearchButton.disabled = true;
  }
  else
  {
    emptyQuerySpan.classList.add('hidden');
    businessQueryGroup.classList.remove('has-error');
    submitSearchButton.disabled = false;
  }
}

if(businessQueryField){
  businessQueryField.onkeyup = function(e){
    queryMessageValidate(businessQueryField.value.length == 0);
  };
}

function submitSearchForm(e){
  searchBusinessForm.submit();
}

if(submitSearchButton){
  submitSearchButton.addEventListener('click', submitSearchForm);
}

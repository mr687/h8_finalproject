require('./bootstrap');
require('admin-lte');

const Swal = require('admin-lte/plugins/sweetalert2/sweetalert2.min.js');
require('admin-lte/plugins/select2/js/select2.full.min.js');
require('admin-lte/plugins/inputmask/jquery.inputmask.min.js');

$('.select2').select2({
  placeholder: '-- Select',
  allowClear: true,
})
$('[data-mask]').inputmask()
$('form').submit(function(e){
  const form = $(this)
  disableSubmitForm(form)
  return true
})

$('body').on('submit', 'form.delete-form', function(e) {
  e.preventDefault()
  alertConfirm((result) => {
    if (result.value) this.submit()
    else enableSubmitForm($(this))
  })
})

function disableSubmitForm(form){
  form.find('input[type="submit"]').attr('disabled', true);
  form.find('button[type="submit"]').attr('disabled', true);
}
function enableSubmitForm(form){
  form.find('input[type="submit"]').removeAttr('disabled');
  form.find('button[type="submit"]').removeAttr('disabled');
}
function alertConfirm(callback, options = {}){
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sure',
    ...options
  }).then(callback)
}
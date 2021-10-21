const Swal = require('admin-lte/plugins/sweetalert2/sweetalert2.min.js');

require('./bootstrap');
require('admin-lte/plugins/sweetalert2/sweetalert2.min.js');
require('admin-lte');

$(document).ready(function(){
  $('.delete-form').submit(function(e) {
    e.preventDefault();
    const that = $(this)
    alertConfirm(() => {
      that.submit()
    }, {
      title: 'Are you sure want to delete this?',
    })
  })
})

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
  }).then(result => {
    if (result.isConfirmed) callback(result)
  })
}
$(function() {
  'use strict';

  $(function() {
    // validate signup form on keyup and submit
    $("#signupForm").validate({
      rules: {
        name: {
          required: true,
          minlength: 3
        },
        nama_perusahaan: {
          required: true,
          minlength: 3
        },
        password: {
          required: true,
          minlength: 8
        },
        password_confirmation: {
          required: true,
          minlength: 8,
          equalTo: "#password"
        },
        email: {
          required: true,
          email: true
        }
      },
      messages: {
        name: {
          required: "Harap masukkan Nama.",
          minlength: "Nama harus terdiri dari minimal 3 karakter."
        },
        nama_perusahaan: {
          required: "Harap masukkan Nama Perusahaan.",
          minlength: "Nama Perusahaan harus terdiri dari minimal 3 karakter."
        },
        password: {
          required: "Harap masukkan kata sandi.",
          minlength: "Kata sandi harus terdiri dari minimal 8 karakter."
        },
        password_confirmation: {
          required: "Harap masukkan konfirmasi kata sandi.",
          minlength: "Konfirmasi kata sandi harus terdiri dari minimal 8 karakter.",
          equalTo: "Harap masukkan kata sandi yang sama seperti di atas"
        },
        email: "Harap masukkan email yang benar.",
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

  });

  $(function() {
    // validate signup form on keyup and submit
    $("#profileForm").validate({
      rules: {
        nama: {
          required: true,
          minlength: 3
        },
        telp: {
          required: true,
          minlength: 11,
          number: true
        },
        nama_perusahaan: {
          required: true,
          minlength: 3
        },
        bidang_usaha: {
          required: true,
        },
        jabatan: {
          required: true,
          minlength: 3
        },
      },
      messages: {
        name: {
          required: "Harap masukkan nama.",
          minlength: "Nama harus terdiri dari minimal 3 karakter."
        },
        telp: {
          required: "Harap masukkan no telepon.",
          minlength: "Telepon harus terdiri dari minimal 11 karakter.",
          number: "Masukkan no telepon yang benar."
        },
        password: {
          required: "Harap masukkan kata sandi.",
          minlength: "Kata sandi harus terdiri dari minimal 8 karakter."
        },
        password_confirmation: {
          required: "Harap masukkan konfirmasi kata sandi.",
          equalTo: "Harap masukkan kata sandi yang sama seperti di atas"
        },
        email: "Harap masukkan email yang benar.",
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

  });

  $(function() {
    // validate signup form on keyup and submit
    $("#pengaduanForm").validate({
      rules: {
        nik: {
          required: true,
          minlength: 16,
          number: true
        },
        nama: {
          required: true,
          minlength: 3
        },
        telp: {
          required: true,
          minlength: 11,
          maxlength: 13,
          number: true
        },
        email: {
          required: true,
          email: true
        },
        lat: {
          required: true,
          minlength: 3
        },
        lng: {
          required: true,
          minlength: 3
        },
        jenis: {
          required: true,
        },
        deskripsi: {
          required: true,
          minlength: 3
        },
      },
      messages: {
        nik: {
          required: "Harap masukkan NIK.",
          minlength: "NIK harus terdiri dari minimal 16 Karakter.",
          number: "NIK harus berupa angka.",
        },
        nama: {
          required: "Harap masukkan nama.",
          minlength: "Nama harus terdiri dari minimal 3 karakter."
        },
        
        telp: {
          required: "Harap masukkan nomor telepon.",
          minlength: "Telepon harus terdiri dari minimal 11 karakter.",
          maxlength: "Telepon harus terdiri dari maksimal 13 karakter.",
          number: "Telepon harus berupa angka.",
        },
        
        email: {
          required: "Harap masukkan email.",
          email: "Masukkan email dengan benar.",
        },
        
        lat: {
          required: "Harap masukkan latitude.",
        },
        
        lng: {
          required: "Harap masukkan longitude.",
        },
        
        jenis: {
          required: "Harap masukkan jenis."
        },
        
        deskripsi: {
          required: "Harap masukkan deskripsi.",
          minlength: "Nama harus terdiri dari minimal 3 karakter."
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

  });

});
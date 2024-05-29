$("#myform").validate({
    rules: {
      heading: "required",
      body: {
        required: true,
        
      }
    },
    messages: {
      heading: "Masukkan Judul!",
      body: {
        required: "Masukkan isi!"
      }
    }
  });
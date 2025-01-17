<script>
    $("#formGift").validate({
        submitHandler: function (form) {
            form.submit();
        },
    });

    // Add hidden input for saving previous url
    $("<input>", {
        type: "hidden",
        id: "previous_url_input",
        name: "previous_url",
        value: window.location.href,
    }).prependTo("#formGift");
</script>
<script>
    if (document.querySelector(".gallery-default")) {
        const gallery = new Splide("#gallery-default", {
            pagination: true,
            type: "loop",
            gap: "1rem",
            perPage: 4,
            perMove: 1,
            lazyload: true,
            breakpoints: {
                992: {
                    perPage: 3,
                },
                576: {
                    perPage: 1,
                },
            },
            grid: {
                rows: 2,
                cols: 1,
            },
        });

        gallery.mount(window.splide.Extensions);
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btnOpenAngpao = document.querySelector("#openAngpao");
        const formAngpao = document.querySelector("#formGift");

        if (btnOpenAngpao) {
            btnOpenAngpao.addEventListener("click", () => {
                formAngpao.classList.remove("d-none");
                btnOpenAngpao.classList.add("d-none");
                ScrollTrigger.refresh();
            });
        }
    });

    $("#anonymous_angpao").click(function () {
        if ($(this).is(":checked")) {
            $(".angpao-field-hideable").prop("required", false);
            $(".angpao-field-hideable").hide("500");
        } else {
            $(".angpao-field-hideable").prop("required", true);
            $(".angpao-field-hideable").show("500");
        }

        setTimeout(function () {
            ScrollTrigger.refresh();
        }, 1000);
    });

    $(document).ready(function () {
        // fonts
        $("head").append('<link rel="stylesheet" href="{{ asset("assets/frontend/libs/font-awesome/css/all.min.css")}}" crossorigin="anonymous" referrerpolicy="no-referrer" />');
        $("head").append('<link rel="stylesheet" href="{{ asset("assets/frontend/libs/splidejs/3.6.11/css/splide.min.css")}}" crossorigin="anonymous" referrerpolicy="no-referrer" />');
        $("head").append('<link rel="stylesheet" href="{{ asset("assets/frontend/css/magnific-popup.css")}}">');
        $("head").append('<link rel="stylesheet" href="{{ asset("assets/frontend/libs/izitoast/1.4.0/css/iziToast.css")}}" crossorigin="anonymous" referrerpolicy="no-referrer" />');

        // font family
        let title_section = 'Baskerville Old Face';
        let couple_name_on_main_font_family = "";
        let couple_name_on_cover_font_family = "Baskerville Classico";
        let couple_name_on_couple_font_family = "Baskerville Classico";
        let parents_name_on_couple_font_family = "";

        // font size
        let couple_name_on_main_font_size = "";
        let couple_name_on_cover_font_size = "40";
        let couple_name_on_couple_font_size = "";
        let parents_name_on_couple_font_size = "";

        // change font family and font size

        $(".title-section h2").css({
            "font-family": title_section,
            "font-size": "38px"
        });

        $(".main_style").css({
            "font-family": couple_name_on_main_font_family,
            "font-size": couple_name_on_main_font_size + "px",
        });

        $(".cover_style").css({
            "font-family": couple_name_on_cover_font_family,
            "font-size": couple_name_on_cover_font_size + "px",
        });

        $(".bride_style").css({
            "font-family": couple_name_on_couple_font_family,
            "font-size": couple_name_on_couple_font_size + "px",
        });

        $(".couple-parent-description p").css({
            "margin-bottom": "0px",
        });

        $(".couple-parent-name p").css({
            "font-family": parents_name_on_couple_font_family,
            "font-size": parents_name_on_couple_font_size + "px",
            "margin-bottom": "0px",
        });

        reload_guestbook_data();
    });

    $("#tambahdata").validate({
        submitHandler: function (form) {
            var actionType = $("#tombolsimpan").val();
            $("#tombolsimpan").prop("disabled", true);
            $("#tombolsimpan").html("Sending..");
            $.ajax({
                data: $("#tambahdata").serialize(),
                url: "{{ route('rsvp.store') }}",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    $("#tombolsimpan").html("Simpan");

                    $("#cardRSVP").html("<p class='mb-5'>Terima kasih telah mengkonfirmasi kehadiran Anda.</p>");

                    ScrollTrigger.refresh();

                    iziToast.success({
                        title: "Sukses",
                        message: "Terimakasih atas konfirmasi anda!",
                        position: "bottomRight",
                    });
                },
                error: function (data) {
                    $("#tombolsimpan").prop("disabled", false);
                    $("#tombolsimpan").html("Simpan");
                    iziToast.error({
                        title: " Gagal Terkirim",
                        message: "Mohon coba lagi"+ (data.responseJSON.message ?? ""),
                        position: "bottomRight",
                    });
                },
            });
        },
    });

    function reload_guestbook_data() {
        if ($("#wishes_wrapper").length) {
            $("#wishes_wrapper").html('<p class="mb-4"><b>Sedang Memuat Komentar..</b></p>');
            var reload_url = $("#wishes_wrapper").data("url");
            $("#wishes_wrapper").load(reload_url);
        }
    }

    $("#guestbook_form").validate({
        submitHandler: function (form) {
            var actionType = $("#tombolsimpan").val();
            $("#guestbook_submit_btn").prop("disabled", true);
            $("#guestbook_submit_btn").html("Sending..");

            $.ajax({
                data: $("#guestbook_form").serialize(),
                url: "{{ route('wishes.store') }}",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    $(".guestbook_form_wrapper").html("<p class='text-center'>Terima Kasih, Anda telah memberikan komentar</p>");
                    $("#guestbook_submit_btn").prop("disabled", false);
                    $("#guestbook_submit_btn").html("Send");

                    reload_guestbook_data();
                    ScrollTrigger.refresh();

                    iziToast.success({
                        title: "Berhasil",
                        message: "Pesan anda telah ditambahkan. Terimakasih!",
                        position: "bottomRight",
                    });
                },
                error: function (data) {
                    $("#guestbook_submit_btn").prop("disabled", false);
                    $("#guestbook_submit_btn").html("Send");

                    iziToast.error({
                        title: "Gagal",
                        message: "Pesan anda gagal ditambahkan. Silahkan mencoba kembali beberapa saat! " + (data.responseJSON.message ?? ""),
                        position: "bottomRight",
                    });
                },
            });
        },
    });
</script>

<script>
    // Clipboard
    var clipboard = new ClipboardJS(".btn-copy-bank-acc");
    console.log(clipboard);

    clipboard.on("success", function (e) {
        alert("Copied Successfully!");
    });

    clipboard.on("error", function (e) {
        alert("Copy failed!");
    });
</script>
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
            autoplay: true,
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
        $("head").append('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />');

        $("head").append('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/3.6.11/css/splide.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />');
        $("head").append('<link rel="stylesheet" href="{{ asset("assets/frontend/css/magnific-popup.css")}}">');
        $("head").append('<link rel="stylesheet" href="{{ asset("assets/frontend/css/icofont/icofont.css")}}">');
        $("head").append('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" crossorigin="anonymous" referrerpolicy="no-referrer" />');

        $.ajaxSetup({
            headers: {
                // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                "X-Requested-With": "XMLHttpRequest",
            },
        });

        // font family
        let couple_name_on_main_font_family = "";
        let couple_name_on_cover_font_family = "";
        let couple_name_on_couple_font_family = "";
        let parents_name_on_couple_font_family = "";

        // font size
        let couple_name_on_main_font_size = "";
        let couple_name_on_cover_font_size = "";
        let couple_name_on_couple_font_size = "";
        let parents_name_on_couple_font_size = "";

        // change font family and font size
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
                url: "http://localhost/generateVenueQr",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    $("#tombolsimpan").html("Simpan");

                    if (data.data.send_rsvp_qrcode == 0 || data.data.status == 0) {
                        if (`id` == "en") {
                            $("#cardRSVP").html("<p class='mb-5'>Thank you for confirming your attendance.</p>");
                        } else {
                            $("#cardRSVP").html("<p class='mb-5'>Terima kasih telah mengkonfirmasi kehadiran Anda.</p>");
                        }
                    } else {
                        if (data.data.whatsapp_rsvp == 1) {
                            if (`id` == "en") {
                                $("#cardRSVP").html(
                                    "<p class='m-4 text-center'>Thank you for confirming your attendance. We have sent a QR Code to your WhatsApp number. Please save the QR Code for later scanning at the event venue</p>"
                                );
                            } else {
                                $("#cardRSVP").html(
                                    "<p class='m-4 text-center'>Terima kasih telah mengkonfirmasi kehadiran Anda. Kami telah mengirimkan QR Code ke nomor WhatsApp Anda. Silahkan simpan QR Code tersebut untuk nantinya discan pada saat di venue acara</p>"
                                );
                            }
                        } else {
                            if (`id` == "en") {
                                $("#cardRSVP").html(
                                    "<p class='m-4 text-center'>Thank you for confirming your attendance. We have sent a QR Code to your email address. Please save the QR Code for later scanning at the event venue</p>"
                                );
                            } else {
                                $("#cardRSVP").html(
                                    "<p class='m-4 text-center'>Terima kasih telah mengkonfirmasi kehadiran Anda. Kami telah mengirimkan QR Code ke alamat email Anda. Silahkan simpan QR Code tersebut untuk nantinya discan pada saat di venue acara</p>"
                                );
                            }
                        }
                    }

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
                        message: "Mohon coba lagi",
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
                url: "http://localhost/bookstore",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    if (`id` == "en") {
                        $(".guestbook_form_wrapper").html("<p class='text-center'>Thank you, you have left a comment</p>");
                    } else {
                        $(".guestbook_form_wrapper").html("<p class='text-center'>Terima Kasih, Anda telah memberikan komentar</p>");
                    }

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
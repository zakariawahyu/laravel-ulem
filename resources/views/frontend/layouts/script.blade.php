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
    var player;
    var player2;
    var gallery_player = document.getElementById("gallery_player");
    var livestream_player = document.getElementById("livestream_player");
    var livestream_player_sm = document.getElementById("livestream_player_small");
    var audio = document.getElementById("audio_file");
    var play_pause_btn = document.getElementById("musicControl");

    function onYouTubeIframeAPIReady() {
        if (gallery_player) {
            player = new YT.Player("gallery_player", {
                height: "390",
                width: "640",
                videoId: "FKUnhbR1GVg",
                events: {
                    onStateChange: onPlayerStateChange,
                },
            });
        }

        if (livestream_player) {
            player2 = new YT.Player("livestream_player", {
                height: "390",
                width: "640",
                videoId: "SzPrFMFqFwM",
                events: {
                    onStateChange: onPlayerStateChange,
                },
            });
        }

        if (livestream_player_sm) {
            player2 = new YT.Player("livestream_player_small", {
                height: "390",
                width: "640",
                videoId: "SzPrFMFqFwM",
                events: {
                    onStateChange: onPlayerStateChange,
                },
            });
        }
    }

    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING) {
            if (audio) {
                if (audio.duration > 0 && !audio.paused) {
                    console.log("Music Paused");
                    play_pause_btn.click();
                }
            }

            if (sound) {
                if (sound.playing()) {
                    play_pause_btn.click();
                }
            }
        }
    }

    function loadYT() {
        var tag = document.createElement("script");
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName("script")[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        console.log("loading youtube iframe");
    }

    $("#closeEnvelope, #btn-envelope, #btn-cover").on("click", function () {
        loadYT();
    });
</script>
<script defer>
    const splide_element = document.querySelector("#gallery-3");

    if (splide_element) {
        const splide = new Splide("#gallery-3", {
            drag: true,
            perPage: 4,
            gap: ".75rem",
            focus: 0,
            pagination: false,
            grid: {
                rows: 2,
            },
            breakpoints: {
                992: {
                    perPage: 3,
                },
                576: {
                    perPage: 1,
                    focus: "center",
                },
            },
        });

        splide.mount(window.splide.Extensions);
    }

    $("#zoom-gallery-3").magnificPopup({
        delegate: "li a",
        type: "image",
        mainClass: "mfp-with-zoom mfp-img-mobile",
        gallery: {
            enabled: true,
        },
        zoom: {
            enabled: true,
            easing: "ease-in-out",
        },
    });

    if (14 <= 8) {
        $(".gallery-section-3 .splide .splide__track ul").addClass("img-centering");
        $(".gallery-section-3 .splide .splide__arrow").addClass("hide-arrow");
    } else {
        $(".gallery-section-3 .splide .splide__track ul").removeClass("img-centering");
    }
</script>

<script>
    if (document.querySelector(".gallery-default")) {
        const gallery = new Splide("#gallery-default", {
            pagination: true,
            type: "loop",
            gap: "1rem",
            perPage: 4,
            perMove: 1,
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

    var section_order = [1, 2, 4, 6, 5, 7, 3, 8, 9];
    var section_wrapper = $(".moveable_section_wrapper");

    section_wrapper.append(
        $.map(section_order, function (elm) {
            return $(".moveable-section[data-id='" + elm + "']");
        })
    );

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

    $(".translate-btn").on("click", function () {
        lang = $(this).data("lang");
        changeLanguageByButtonClick(lang);
    });

    function googleTranslateElementInit() {
        new google.translate.TranslateElement(
            {
                pageLanguage: "localhost",
            },
            "google_translate_element"
        );
    }

    function changeLanguageByButtonClick(lang) {
        // var language = document.getElementById("language").value;
        var selectField = document.querySelector("#google_translate_element select");
        for (var i = 0; i < selectField.children.length; i++) {
            var option = selectField.children[i];
            // find desired langauge and change the former language of the hidden selection-field
            if (option.value == lang) {
                selectField.selectedIndex = i;
                // trigger change event afterwards to make google-lib translate this side
                selectField.dispatchEvent(new Event("change"));
                break;
            }
        }
    }

    function reset_translation() {
        $(".skiptranslate iframe").contents().find("#\\:1\\.restore").click();
    }

    /** Color Picker **/
    const defaultColors = {
        main: "#1f180a",
        primary: "#cabfa3",
        secondary: "#837d6c",
    };

    const cp = colorpicker(document.querySelector(".colorpicker__wrapper"), defaultColors, "");

    /** End of Color Picker **/
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
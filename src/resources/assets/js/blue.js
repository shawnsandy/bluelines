/**
 * Created by Shawn on 7/11/2017.
 */


$(".widget-forms").each(function () {

    var el = $(this);
    console.log(el);
    var button = $(el).find('.tag-button');
    var frm = $(el).find('.bluform');

    $(button).on('click', function () {
        console.log($(button).text());
        $(frm).fadeToggle();
    });

});

$("form").each(function () {
    var forms = $(this);
    console.log(forms.length);
    $(forms).find("input,textarea,select").filter("[required]").each(function () {
        var rfields = $(this);
        console.log('tfileds' + rfields.length);
    });
    $(forms).submit(function (e) {

        $("input,textarea,select").filter('[required]').each(function () {
            if ($(this.val() === "")) {
                e.preventDefault();
                $(this).addClass("validate-error").val('*');
            }

        });
    })
});

$(".delete-btn").each(function () {
    var el = $(this);

    $(el).click(function (e) {
        var elValue = el.html();
        if (elValue === "<i class=\"fa fa-times\"></i>") {
            e.preventDefault();
            el.html("<i class=\"fa fa-check\"></i>");
            setTimeout(function () {
                el.html("<i class=\"fa fa-times\"></i>");
            }, 4000);
        }
    });

});

jQuery(document).ready(function () {
    $(this).main();
    $('#ButtonArticleUpdate').each((function () {
        $(this).Articles();
    }));
    $('#ButtonAdd').each((function () {
        $(this).Product();
    }));
    $('#ButtonUpdateContact').each((function () {
        $(this).Contact();
    }));
    $('#addPromotions').each((function () {
        $(this).Promotions();
    }));
    $('#textCollection').each((function () {
        $(this).Collection();
    }));
});
$(document).ready(function() {
    let currentPage = 1;
    const pageSize = 10;
    const credit_cardsTable = $('#table-credit_cards');
    const rows = credit_cardsTable.find('tbody tr');
    const numCredit_cards = rows.length;
    const numPages = Math.ceil(numCredit_cards / pageSize);

    rows.removeClass('d-none');

    $('#nav-credit_cards .page-link').on("click", function (e) {
        e.preventDefault();
        let page = $(this).data('page');
        if (page === "previous") {
            page = (currentPage > 1) ? currentPage - 1 : currentPage;
        }
        else if (page === "next") {
            page = (currentPage < numPages ) ? currentPage + 1 : currentPage;
        }
        showPage(page);
    });

    function showPage(page) {
        const firstRow = (page - 1) * pageSize;
        const lastRow = firstRow + pageSize;
        rows.each(function (index, row) {
            if (index >= firstRow && index < lastRow) {
                $(row).show();
            }
            else {
                $(row).hide();
            }
        });
        currentPage = page;
    }

    showPage(currentPage);
})
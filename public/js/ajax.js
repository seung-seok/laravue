var url = "/item";
$(document).ready(function () {
  get_itemlist();
  console.log('resd');
});

function get_itemlist() {
  var cats = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  // 대 카테고리에 따른 중 카테고리 설정
  cats ? category_num = cats.split('_')[1] : category_num = '00';
  $.ajax({
    type: "GET",
    url: url + '?cats=' + cats,
    dataType: "json",
    success: function success(data) {
      console.log(data);
      // create_element(data);
    },
    error: function error(jqXHR) {
      console.log("error: " + jqXHR.responseText);
    }
  });
}

function create_element(data) {
  // var layout = document.querySelector('#item_list');
  var layout = $('#item_list')[0];
  $('#item_list').empty();
  data.forEach(function (el) {
    var rank_class = '';
    var div = document.createElement("div");
    div.id = 'item_' + el.rank;
    div.className = 'item'; // Rank 변동 check

    var rank_cal = el.rankYesterday - el.rank;

    if (Math.sign(rank_cal) == 1) {
      rank_class = 'positive';
      rank_cal = "\u25B2 ".concat(rank_cal);
    } else if (Math.sign(rank_cal) == -1) {
      rank_class = 'negative';
      rank_cal = "\u25BC ".concat(-rank_cal);
    } else if (rank_cal == 0) {
      rank_class = '';
      rank_cal = '-';
    } // NEW 상품


    if (el.rankYesterday == 'NEW') {
      rank_class = 'positive';
      rank_cal = "NEW";
    }

    div.innerHTML += "<div class=\"item_header\">\n        <div class=\"item_no\">".concat(el.rank.padStart(2, '0'), "</div>\n        <div class=\"item_rank ").concat(rank_class, "\">").concat(rank_cal, "</div>\n        </div>");
    div.innerHTML += "<img src=\"".concat(el.thumb, "\" alt=\"\" class=\"item_img\">");
    div.innerHTML += "<div class=\"item_title\">".concat(el.itemTitle, "</div>");
    div.innerHTML += "<div class=\"item_price\"><span style=\"font-size:24px\">".concat(el.price.replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ","), "</span>\uC6D0</div>");
    div.innerHTML += "<div class=\"item_uni\">\uCD5C\uC18C".concat(el.qty, "\uAC1C</div>");
    layout.appendChild(div);
  });
}
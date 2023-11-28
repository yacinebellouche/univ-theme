import $ from "jquery";

class Like {
  constructor() {
    this.events();
  }
  events() {
    $(".like-box").on("click", this.clickDispatcherLike.bind(this));
  }

  clickDispatcherLike(e) {
    var currentLikeBox = $(e.target.closest(".like-box"));
    if (currentLikeBox.attr("data-exists") == "yes") {
      this.deleteLike(currentLikeBox);
    } else {
      this.createLike(currentLikeBox);
    }
  }

  createLike(currentLikeBox) {
    $.ajax({
      beforeSend: (xhr) => {
        xhr.setRequestHeader("X-WP-Nonce", univData.nonce);
      },
      url: univData.root_url + "/wp-json/univ/v1/manageLike",
      type: "POST",
      data: { professorId: currentLikeBox.data("id") },
      success: (response) => {
        currentLikeBox.attr("data-exists", "yes");
        var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10);
        likeCount++;
        currentLikeBox.attr("data-like", response);
        currentLikeBox.find(".like-count").html(likeCount);

        console.log(response);
      },
      error: (response) => {
        console.log(response);
      },
    });
  }
  deleteLike(currentLikeBox) {
    $.ajax({
      beforeSend: (xhr) => {
        xhr.setRequestHeader("X-WP-Nonce", univData.nonce);
      },
      url: univData.root_url + "/wp-json/univ/v1/manageLike",
      type: "DELETE",
      data: { like: currentLikeBox.attr("data-like") },
      success: (response) => {
        currentLikeBox.attr("data-exists", "no");
        var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10);
        likeCount--;
        currentLikeBox.attr("data-like", "");
        currentLikeBox.find(".like-count").html(likeCount);

        console.log(response);
      },
      error: (response) => {
        console.log(response);
      },
    });
  }
}

export default Like;

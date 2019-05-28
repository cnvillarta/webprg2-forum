function switchToPosts() {
    removeActive();
    hideAll();
    $("#posts-tab").addClass("is-active");
    $("#posts-tab-content").removeClass("is-hidden");
  }

  function switchToComments() {
    removeActive();
    hideAll();
    $("#comments-tab").addClass("is-active");
    $("#comments-tab-content").removeClass("is-hidden");
  }

  function switchToVotes() {
    removeActive();
    hideAll();
    $("#votes-tab").addClass("is-active");
    $("#votes-tab-content").removeClass("is-hidden");
  }

  function removeActive() {
    $("li").each(function() {
      $(this).removeClass("is-active");
    });
  }

  function hideAll(){
    $("#posts-tab-content").addClass("is-hidden");
    $("#comments-tab-content").addClass("is-hidden");
    $("#votes-tab-content").addClass("is-hidden");
  }
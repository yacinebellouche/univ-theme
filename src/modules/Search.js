import $ from "jquery";
class Search {
  // 1. describe and initiate the object
  constructor() {
    this.openButton = $(".js-search-trigger");
    this.closeButton = $(".search-overlay__close");
    this.searchOverlay = $(".search-overlay");
    this.eventns();
    this.isOverlayOpen = false;
  }
  // 2. events
  eventns() {
    this.openButton.on("click", this.openOverlay.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
    $(document).on("keydown",this.keyPressDispatcher.bind(this))
  }

  // 3. methods
  openOverlay() {
   this.searchOverlay.addClass("search-overlay--active");
   $("body").addClass("body-no-scroll");
   this.isOverlayOpen = true;
  }
  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active");
    $("body").removeClass("body-no-scroll");
    this.isOverlayOpen = true;
}
keyPressDispatcher(e){
    if(e.keyCode==83 && !this.isOverlayOpen){
        this.openOverlay();
    }
    if(e.keyCode==27 && this.isOverlayOpen){
        this.closeOverlay();
    }

}
}
export default Search;

class IframeResize {
  iframeResize() {
    this.youtubeIframesResize();
    const that = this;
    window.addEventListener('resize', function() {
      that.youtubeIframesResize();
    });
  }

  youtubeIframesResize() {
    let iframes = document.querySelectorAll('.embed-responsive>iframe');
    if (iframes === undefined || iframes === null) {
      return;
    }


    for (let i = 0; i < iframes.length; i++) {
      let width = iframes[i].clientWidth;
      iframes[i].style.height = width * 0.5625 + 'px';
    }
  }
}

export default IframeResize;

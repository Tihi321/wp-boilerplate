import {ScrollToElement} from './scroll-to';
import IframeResize from './iframe-resizer';

$(function() {
  const scrollTo = new ScrollToElement();
  const resize = new IframeResize();

  scrollTo.scrolltoGlobalElement();
  scrollTo.scrolltoTopElement();
  resize.iframeResize();
});

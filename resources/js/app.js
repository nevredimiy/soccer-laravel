import './bootstrap';
import.meta.glob([
    '../fonts/**',
  ]);


(() => {
    "use strict";
    function formRating() {
        const ratings = document.querySelectorAll("[data-rating]");
        if (ratings) ratings.forEach((rating => {
            const ratingValue = +rating.dataset.ratingValue;
            const ratingSize = +rating.dataset.ratingSize ? +rating.dataset.ratingSize : 5;
            formRatingInit(rating, ratingSize);
            ratingValue ? formRatingSet(rating, ratingValue) : null;
            document.addEventListener("click", formRatingAction);
        }));
        function formRatingAction(e) {
            const targetElement = e.target;
            if (targetElement.closest(".rating__input")) {
                const currentElement = targetElement.closest(".rating__input");
                const ratingValue = +currentElement.value;
                const rating = currentElement.closest(".rating");
                const ratingSet = rating.dataset.rating === "set";
                ratingSet ? formRatingGet(rating, ratingValue) : null;
            }
        }
        function formRatingInit(rating, ratingSize) {
            let ratingItems = ``;
            for (let index = 0; index < ratingSize; index++) {
                index === 0 ? ratingItems += `<div class="rating__items">` : null;
                ratingItems += `\n\t\t\t\t<label class="rating__item">\n\t\t\t\t\t<input class="rating__input" type="radio" name="rating" value="${index + 1}">\n\t\t\t\t\t<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">\n\t\t\t\t\t\t<path d="M0.669408 7.82732C0.398804 7.57384 0.545797 7.11561 0.911812 7.07165L6.09806 6.44858C6.24723 6.43066 6.3768 6.33578 6.43972 6.19761L8.62721 1.39406C8.78159 1.05505 9.25739 1.05499 9.41177 1.39399L11.5993 6.19751C11.6622 6.33568 11.7909 6.43082 11.9401 6.44873L17.1266 7.07165C17.4926 7.11561 17.6392 7.57398 17.3686 7.82745L13.5347 11.4193C13.4244 11.5226 13.3753 11.6764 13.4046 11.8256L14.4221 17.0141C14.4939 17.3803 14.1092 17.664 13.7876 17.4816L9.23042 14.8972C9.09934 14.8228 8.94009 14.8232 8.80901 14.8975L4.25138 17.481C3.92976 17.6633 3.54432 17.3802 3.61615 17.0141L4.63382 11.8259C4.66309 11.6767 4.61412 11.5226 4.50383 11.4193L0.669408 7.82732Z" stroke-linecap="round" stroke-linejoin="round"/>\n\t\t\t\t\t</svg>\n\t\t\t\t</label>`;
                index === ratingSize ? ratingItems += `</div">` : null;
            }
            rating.insertAdjacentHTML("beforeend", ratingItems);
        }
        function formRatingGet(rating, ratingValue) {
            const resultRating = ratingValue;
            formRatingSet(rating, resultRating);
        }
        function formRatingSet(rating, value) {
            const ratingItems = rating.querySelectorAll(".rating__item");
            const resultFullItems = parseInt(value);
            const resultPartItem = value - resultFullItems;
            rating.hasAttribute("data-rating-title") ? rating.title = value : null;
            ratingItems.forEach(((ratingItem, index) => {
                ratingItem.classList.remove("rating__item--active");
                ratingItem.querySelector("span") ? ratingItems[index].querySelector("span").remove() : null;
                if (index <= resultFullItems - 1) ratingItem.classList.add("rating__item--active");
                if (index === resultFullItems && resultPartItem) ratingItem.insertAdjacentHTML("beforeend", `<span style="width:${resultPartItem * 100}%"></span>`);
            }));
        }
    }
    function isObject(value) {
        var type = typeof value;
        return value != null && (type == "object" || type == "function");
    }
    const lodash_es_isObject = isObject;
    var freeGlobal = typeof global == "object" && global && global.Object === Object && global;
    const _freeGlobal = freeGlobal;
    var freeSelf = typeof self == "object" && self && self.Object === Object && self;
    var root = _freeGlobal || freeSelf || Function("return this")();
    const _root = root;
    var now = function() {
        return _root.Date.now();
    };
    const lodash_es_now = now;
    var reWhitespace = /\s/;
    function trimmedEndIndex(string) {
        var index = string.length;
        while (index-- && reWhitespace.test(string.charAt(index))) ;
        return index;
    }
    const _trimmedEndIndex = trimmedEndIndex;
    var reTrimStart = /^\s+/;
    function baseTrim(string) {
        return string ? string.slice(0, _trimmedEndIndex(string) + 1).replace(reTrimStart, "") : string;
    }
    const _baseTrim = baseTrim;
    var Symbol = _root.Symbol;
    const _Symbol = Symbol;
    var objectProto = Object.prototype;
    var _getRawTag_hasOwnProperty = objectProto.hasOwnProperty;
    var nativeObjectToString = objectProto.toString;
    var symToStringTag = _Symbol ? _Symbol.toStringTag : void 0;
    function getRawTag(value) {
        var isOwn = _getRawTag_hasOwnProperty.call(value, symToStringTag), tag = value[symToStringTag];
        try {
            value[symToStringTag] = void 0;
            var unmasked = true;
        } catch (e) {}
        var result = nativeObjectToString.call(value);
        if (unmasked) if (isOwn) value[symToStringTag] = tag; else delete value[symToStringTag];
        return result;
    }
    const _getRawTag = getRawTag;
    var _objectToString_objectProto = Object.prototype;
    var _objectToString_nativeObjectToString = _objectToString_objectProto.toString;
    function objectToString(value) {
        return _objectToString_nativeObjectToString.call(value);
    }
    const _objectToString = objectToString;
    var nullTag = "[object Null]", undefinedTag = "[object Undefined]";
    var _baseGetTag_symToStringTag = _Symbol ? _Symbol.toStringTag : void 0;
    function baseGetTag(value) {
        if (value == null) return value === void 0 ? undefinedTag : nullTag;
        return _baseGetTag_symToStringTag && _baseGetTag_symToStringTag in Object(value) ? _getRawTag(value) : _objectToString(value);
    }
    const _baseGetTag = baseGetTag;
    function isObjectLike(value) {
        return value != null && typeof value == "object";
    }
    const lodash_es_isObjectLike = isObjectLike;
    var symbolTag = "[object Symbol]";
    function isSymbol(value) {
        return typeof value == "symbol" || lodash_es_isObjectLike(value) && _baseGetTag(value) == symbolTag;
    }
    const lodash_es_isSymbol = isSymbol;
    var NAN = 0 / 0;
    var reIsBadHex = /^[-+]0x[0-9a-f]+$/i;
    var reIsBinary = /^0b[01]+$/i;
    var reIsOctal = /^0o[0-7]+$/i;
    var freeParseInt = parseInt;
    function toNumber(value) {
        if (typeof value == "number") return value;
        if (lodash_es_isSymbol(value)) return NAN;
        if (lodash_es_isObject(value)) {
            var other = typeof value.valueOf == "function" ? value.valueOf() : value;
            value = lodash_es_isObject(other) ? other + "" : other;
        }
        if (typeof value != "string") return value === 0 ? value : +value;
        value = _baseTrim(value);
        var isBinary = reIsBinary.test(value);
        return isBinary || reIsOctal.test(value) ? freeParseInt(value.slice(2), isBinary ? 2 : 8) : reIsBadHex.test(value) ? NAN : +value;
    }
    const lodash_es_toNumber = toNumber;
    var FUNC_ERROR_TEXT = "Expected a function";
    var nativeMax = Math.max, nativeMin = Math.min;
    function debounce(func, wait, options) {
        var lastArgs, lastThis, maxWait, result, timerId, lastCallTime, lastInvokeTime = 0, leading = false, maxing = false, trailing = true;
        if (typeof func != "function") throw new TypeError(FUNC_ERROR_TEXT);
        wait = lodash_es_toNumber(wait) || 0;
        if (lodash_es_isObject(options)) {
            leading = !!options.leading;
            maxing = "maxWait" in options;
            maxWait = maxing ? nativeMax(lodash_es_toNumber(options.maxWait) || 0, wait) : maxWait;
            trailing = "trailing" in options ? !!options.trailing : trailing;
        }
        function invokeFunc(time) {
            var args = lastArgs, thisArg = lastThis;
            lastArgs = lastThis = void 0;
            lastInvokeTime = time;
            result = func.apply(thisArg, args);
            return result;
        }
        function leadingEdge(time) {
            lastInvokeTime = time;
            timerId = setTimeout(timerExpired, wait);
            return leading ? invokeFunc(time) : result;
        }
        function remainingWait(time) {
            var timeSinceLastCall = time - lastCallTime, timeSinceLastInvoke = time - lastInvokeTime, timeWaiting = wait - timeSinceLastCall;
            return maxing ? nativeMin(timeWaiting, maxWait - timeSinceLastInvoke) : timeWaiting;
        }
        function shouldInvoke(time) {
            var timeSinceLastCall = time - lastCallTime, timeSinceLastInvoke = time - lastInvokeTime;
            return lastCallTime === void 0 || timeSinceLastCall >= wait || timeSinceLastCall < 0 || maxing && timeSinceLastInvoke >= maxWait;
        }
        function timerExpired() {
            var time = lodash_es_now();
            if (shouldInvoke(time)) return trailingEdge(time);
            timerId = setTimeout(timerExpired, remainingWait(time));
        }
        function trailingEdge(time) {
            timerId = void 0;
            if (trailing && lastArgs) return invokeFunc(time);
            lastArgs = lastThis = void 0;
            return result;
        }
        function cancel() {
            if (timerId !== void 0) clearTimeout(timerId);
            lastInvokeTime = 0;
            lastArgs = lastCallTime = lastThis = timerId = void 0;
        }
        function flush() {
            return timerId === void 0 ? result : trailingEdge(lodash_es_now());
        }
        function debounced() {
            var time = lodash_es_now(), isInvoking = shouldInvoke(time);
            lastArgs = arguments;
            lastThis = this;
            lastCallTime = time;
            if (isInvoking) {
                if (timerId === void 0) return leadingEdge(lastCallTime);
                if (maxing) {
                    clearTimeout(timerId);
                    timerId = setTimeout(timerExpired, wait);
                    return invokeFunc(lastCallTime);
                }
            }
            if (timerId === void 0) timerId = setTimeout(timerExpired, wait);
            return result;
        }
        debounced.cancel = cancel;
        debounced.flush = flush;
        return debounced;
    }
    const lodash_es_debounce = debounce;
    var throttle_FUNC_ERROR_TEXT = "Expected a function";
    function throttle(func, wait, options) {
        var leading = true, trailing = true;
        if (typeof func != "function") throw new TypeError(throttle_FUNC_ERROR_TEXT);
        if (lodash_es_isObject(options)) {
            leading = "leading" in options ? !!options.leading : leading;
            trailing = "trailing" in options ? !!options.trailing : trailing;
        }
        return lodash_es_debounce(func, wait, {
            leading,
            maxWait: wait,
            trailing
        });
    }
    const lodash_es_throttle = throttle;
    var __assign = function() {
        __assign = Object.assign || function __assign(t) {
            for (var s, i = 1, n = arguments.length; i < n; i++) {
                s = arguments[i];
                for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p)) t[p] = s[p];
            }
            return t;
        };
        return __assign.apply(this, arguments);
    };
    function getElementWindow$1(element) {
        if (!element || !element.ownerDocument || !element.ownerDocument.defaultView) return window;
        return element.ownerDocument.defaultView;
    }
    function getElementDocument$1(element) {
        if (!element || !element.ownerDocument) return document;
        return element.ownerDocument;
    }
    var getOptions$1 = function(obj) {
        var initialObj = {};
        var options = Array.prototype.reduce.call(obj, (function(acc, attribute) {
            var option = attribute.name.match(/data-simplebar-(.+)/);
            if (option) {
                var key = option[1].replace(/\W+(.)/g, (function(_, chr) {
                    return chr.toUpperCase();
                }));
                switch (attribute.value) {
                  case "true":
                    acc[key] = true;
                    break;

                  case "false":
                    acc[key] = false;
                    break;

                  case void 0:
                    acc[key] = true;
                    break;

                  default:
                    acc[key] = attribute.value;
                }
            }
            return acc;
        }), initialObj);
        return options;
    };
    function addClasses$1(el, classes) {
        var _a;
        if (!el) return;
        (_a = el.classList).add.apply(_a, classes.split(" "));
    }
    function removeClasses$1(el, classes) {
        if (!el) return;
        classes.split(" ").forEach((function(className) {
            el.classList.remove(className);
        }));
    }
    function classNamesToQuery$1(classNames) {
        return ".".concat(classNames.split(" ").join("."));
    }
    var canUseDOM = !!(typeof window !== "undefined" && window.document && window.document.createElement);
    var helpers = Object.freeze({
        __proto__: null,
        addClasses: addClasses$1,
        canUseDOM,
        classNamesToQuery: classNamesToQuery$1,
        getElementDocument: getElementDocument$1,
        getElementWindow: getElementWindow$1,
        getOptions: getOptions$1,
        removeClasses: removeClasses$1
    });
    var cachedScrollbarWidth = null;
    var cachedDevicePixelRatio = null;
    if (canUseDOM) window.addEventListener("resize", (function() {
        if (cachedDevicePixelRatio !== window.devicePixelRatio) {
            cachedDevicePixelRatio = window.devicePixelRatio;
            cachedScrollbarWidth = null;
        }
    }));
    function scrollbarWidth() {
        if (cachedScrollbarWidth === null) {
            if (typeof document === "undefined") {
                cachedScrollbarWidth = 0;
                return cachedScrollbarWidth;
            }
            var body = document.body;
            var box = document.createElement("div");
            box.classList.add("simplebar-hide-scrollbar");
            body.appendChild(box);
            var width = box.getBoundingClientRect().right;
            body.removeChild(box);
            cachedScrollbarWidth = width;
        }
        return cachedScrollbarWidth;
    }
    var getElementWindow = getElementWindow$1, getElementDocument = getElementDocument$1, getOptions = getOptions$1, addClasses = addClasses$1, dist_removeClasses = removeClasses$1, classNamesToQuery = classNamesToQuery$1;
    var SimpleBarCore = function() {
        function SimpleBarCore(element, options) {
            if (options === void 0) options = {};
            var _this = this;
            this.removePreventClickId = null;
            this.minScrollbarWidth = 20;
            this.stopScrollDelay = 175;
            this.isScrolling = false;
            this.isMouseEntering = false;
            this.isDragging = false;
            this.scrollXTicking = false;
            this.scrollYTicking = false;
            this.wrapperEl = null;
            this.contentWrapperEl = null;
            this.contentEl = null;
            this.offsetEl = null;
            this.maskEl = null;
            this.placeholderEl = null;
            this.heightAutoObserverWrapperEl = null;
            this.heightAutoObserverEl = null;
            this.rtlHelpers = null;
            this.scrollbarWidth = 0;
            this.resizeObserver = null;
            this.mutationObserver = null;
            this.elStyles = null;
            this.isRtl = null;
            this.mouseX = 0;
            this.mouseY = 0;
            this.onMouseMove = function() {};
            this.onWindowResize = function() {};
            this.onStopScrolling = function() {};
            this.onMouseEntered = function() {};
            this.onScroll = function() {
                var elWindow = getElementWindow(_this.el);
                if (!_this.scrollXTicking) {
                    elWindow.requestAnimationFrame(_this.scrollX);
                    _this.scrollXTicking = true;
                }
                if (!_this.scrollYTicking) {
                    elWindow.requestAnimationFrame(_this.scrollY);
                    _this.scrollYTicking = true;
                }
                if (!_this.isScrolling) {
                    _this.isScrolling = true;
                    addClasses(_this.el, _this.classNames.scrolling);
                }
                _this.showScrollbar("x");
                _this.showScrollbar("y");
                _this.onStopScrolling();
            };
            this.scrollX = function() {
                if (_this.axis.x.isOverflowing) _this.positionScrollbar("x");
                _this.scrollXTicking = false;
            };
            this.scrollY = function() {
                if (_this.axis.y.isOverflowing) _this.positionScrollbar("y");
                _this.scrollYTicking = false;
            };
            this._onStopScrolling = function() {
                dist_removeClasses(_this.el, _this.classNames.scrolling);
                if (_this.options.autoHide) {
                    _this.hideScrollbar("x");
                    _this.hideScrollbar("y");
                }
                _this.isScrolling = false;
            };
            this.onMouseEnter = function() {
                if (!_this.isMouseEntering) {
                    addClasses(_this.el, _this.classNames.mouseEntered);
                    _this.showScrollbar("x");
                    _this.showScrollbar("y");
                    _this.isMouseEntering = true;
                }
                _this.onMouseEntered();
            };
            this._onMouseEntered = function() {
                dist_removeClasses(_this.el, _this.classNames.mouseEntered);
                if (_this.options.autoHide) {
                    _this.hideScrollbar("x");
                    _this.hideScrollbar("y");
                }
                _this.isMouseEntering = false;
            };
            this._onMouseMove = function(e) {
                _this.mouseX = e.clientX;
                _this.mouseY = e.clientY;
                if (_this.axis.x.isOverflowing || _this.axis.x.forceVisible) _this.onMouseMoveForAxis("x");
                if (_this.axis.y.isOverflowing || _this.axis.y.forceVisible) _this.onMouseMoveForAxis("y");
            };
            this.onMouseLeave = function() {
                _this.onMouseMove.cancel();
                if (_this.axis.x.isOverflowing || _this.axis.x.forceVisible) _this.onMouseLeaveForAxis("x");
                if (_this.axis.y.isOverflowing || _this.axis.y.forceVisible) _this.onMouseLeaveForAxis("y");
                _this.mouseX = -1;
                _this.mouseY = -1;
            };
            this._onWindowResize = function() {
                _this.scrollbarWidth = _this.getScrollbarWidth();
                _this.hideNativeScrollbar();
            };
            this.onPointerEvent = function(e) {
                if (!_this.axis.x.track.el || !_this.axis.y.track.el || !_this.axis.x.scrollbar.el || !_this.axis.y.scrollbar.el) return;
                var isWithinTrackXBounds, isWithinTrackYBounds;
                _this.axis.x.track.rect = _this.axis.x.track.el.getBoundingClientRect();
                _this.axis.y.track.rect = _this.axis.y.track.el.getBoundingClientRect();
                if (_this.axis.x.isOverflowing || _this.axis.x.forceVisible) isWithinTrackXBounds = _this.isWithinBounds(_this.axis.x.track.rect);
                if (_this.axis.y.isOverflowing || _this.axis.y.forceVisible) isWithinTrackYBounds = _this.isWithinBounds(_this.axis.y.track.rect);
                if (isWithinTrackXBounds || isWithinTrackYBounds) {
                    e.stopPropagation();
                    if (e.type === "pointerdown" && e.pointerType !== "touch") {
                        if (isWithinTrackXBounds) {
                            _this.axis.x.scrollbar.rect = _this.axis.x.scrollbar.el.getBoundingClientRect();
                            if (_this.isWithinBounds(_this.axis.x.scrollbar.rect)) _this.onDragStart(e, "x"); else _this.onTrackClick(e, "x");
                        }
                        if (isWithinTrackYBounds) {
                            _this.axis.y.scrollbar.rect = _this.axis.y.scrollbar.el.getBoundingClientRect();
                            if (_this.isWithinBounds(_this.axis.y.scrollbar.rect)) _this.onDragStart(e, "y"); else _this.onTrackClick(e, "y");
                        }
                    }
                }
            };
            this.drag = function(e) {
                var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k, _l;
                if (!_this.draggedAxis || !_this.contentWrapperEl) return;
                var eventOffset;
                var track = _this.axis[_this.draggedAxis].track;
                var trackSize = (_b = (_a = track.rect) === null || _a === void 0 ? void 0 : _a[_this.axis[_this.draggedAxis].sizeAttr]) !== null && _b !== void 0 ? _b : 0;
                var scrollbar = _this.axis[_this.draggedAxis].scrollbar;
                var contentSize = (_d = (_c = _this.contentWrapperEl) === null || _c === void 0 ? void 0 : _c[_this.axis[_this.draggedAxis].scrollSizeAttr]) !== null && _d !== void 0 ? _d : 0;
                var hostSize = parseInt((_f = (_e = _this.elStyles) === null || _e === void 0 ? void 0 : _e[_this.axis[_this.draggedAxis].sizeAttr]) !== null && _f !== void 0 ? _f : "0px", 10);
                e.preventDefault();
                e.stopPropagation();
                if (_this.draggedAxis === "y") eventOffset = e.pageY; else eventOffset = e.pageX;
                var dragPos = eventOffset - ((_h = (_g = track.rect) === null || _g === void 0 ? void 0 : _g[_this.axis[_this.draggedAxis].offsetAttr]) !== null && _h !== void 0 ? _h : 0) - _this.axis[_this.draggedAxis].dragOffset;
                dragPos = _this.draggedAxis === "x" && _this.isRtl ? ((_k = (_j = track.rect) === null || _j === void 0 ? void 0 : _j[_this.axis[_this.draggedAxis].sizeAttr]) !== null && _k !== void 0 ? _k : 0) - scrollbar.size - dragPos : dragPos;
                var dragPerc = dragPos / (trackSize - scrollbar.size);
                var scrollPos = dragPerc * (contentSize - hostSize);
                if (_this.draggedAxis === "x" && _this.isRtl) scrollPos = ((_l = SimpleBarCore.getRtlHelpers()) === null || _l === void 0 ? void 0 : _l.isScrollingToNegative) ? -scrollPos : scrollPos;
                _this.contentWrapperEl[_this.axis[_this.draggedAxis].scrollOffsetAttr] = scrollPos;
            };
            this.onEndDrag = function(e) {
                _this.isDragging = false;
                var elDocument = getElementDocument(_this.el);
                var elWindow = getElementWindow(_this.el);
                e.preventDefault();
                e.stopPropagation();
                dist_removeClasses(_this.el, _this.classNames.dragging);
                _this.onStopScrolling();
                elDocument.removeEventListener("mousemove", _this.drag, true);
                elDocument.removeEventListener("mouseup", _this.onEndDrag, true);
                _this.removePreventClickId = elWindow.setTimeout((function() {
                    elDocument.removeEventListener("click", _this.preventClick, true);
                    elDocument.removeEventListener("dblclick", _this.preventClick, true);
                    _this.removePreventClickId = null;
                }));
            };
            this.preventClick = function(e) {
                e.preventDefault();
                e.stopPropagation();
            };
            this.el = element;
            this.options = __assign(__assign({}, SimpleBarCore.defaultOptions), options);
            this.classNames = __assign(__assign({}, SimpleBarCore.defaultOptions.classNames), options.classNames);
            this.axis = {
                x: {
                    scrollOffsetAttr: "scrollLeft",
                    sizeAttr: "width",
                    scrollSizeAttr: "scrollWidth",
                    offsetSizeAttr: "offsetWidth",
                    offsetAttr: "left",
                    overflowAttr: "overflowX",
                    dragOffset: 0,
                    isOverflowing: true,
                    forceVisible: false,
                    track: {
                        size: null,
                        el: null,
                        rect: null,
                        isVisible: false
                    },
                    scrollbar: {
                        size: null,
                        el: null,
                        rect: null,
                        isVisible: false
                    }
                },
                y: {
                    scrollOffsetAttr: "scrollTop",
                    sizeAttr: "height",
                    scrollSizeAttr: "scrollHeight",
                    offsetSizeAttr: "offsetHeight",
                    offsetAttr: "top",
                    overflowAttr: "overflowY",
                    dragOffset: 0,
                    isOverflowing: true,
                    forceVisible: false,
                    track: {
                        size: null,
                        el: null,
                        rect: null,
                        isVisible: false
                    },
                    scrollbar: {
                        size: null,
                        el: null,
                        rect: null,
                        isVisible: false
                    }
                }
            };
            if (typeof this.el !== "object" || !this.el.nodeName) throw new Error("Argument passed to SimpleBar must be an HTML element instead of ".concat(this.el));
            this.onMouseMove = lodash_es_throttle(this._onMouseMove, 64);
            this.onWindowResize = lodash_es_debounce(this._onWindowResize, 64, {
                leading: true
            });
            this.onStopScrolling = lodash_es_debounce(this._onStopScrolling, this.stopScrollDelay);
            this.onMouseEntered = lodash_es_debounce(this._onMouseEntered, this.stopScrollDelay);
            this.init();
        }
        SimpleBarCore.getRtlHelpers = function() {
            if (SimpleBarCore.rtlHelpers) return SimpleBarCore.rtlHelpers;
            var dummyDiv = document.createElement("div");
            dummyDiv.innerHTML = '<div class="simplebar-dummy-scrollbar-size"><div></div></div>';
            var scrollbarDummyEl = dummyDiv.firstElementChild;
            var dummyChild = scrollbarDummyEl === null || scrollbarDummyEl === void 0 ? void 0 : scrollbarDummyEl.firstElementChild;
            if (!dummyChild) return null;
            document.body.appendChild(scrollbarDummyEl);
            scrollbarDummyEl.scrollLeft = 0;
            var dummyContainerOffset = SimpleBarCore.getOffset(scrollbarDummyEl);
            var dummyChildOffset = SimpleBarCore.getOffset(dummyChild);
            scrollbarDummyEl.scrollLeft = -999;
            var dummyChildOffsetAfterScroll = SimpleBarCore.getOffset(dummyChild);
            document.body.removeChild(scrollbarDummyEl);
            SimpleBarCore.rtlHelpers = {
                isScrollOriginAtZero: dummyContainerOffset.left !== dummyChildOffset.left,
                isScrollingToNegative: dummyChildOffset.left !== dummyChildOffsetAfterScroll.left
            };
            return SimpleBarCore.rtlHelpers;
        };
        SimpleBarCore.prototype.getScrollbarWidth = function() {
            try {
                if (this.contentWrapperEl && getComputedStyle(this.contentWrapperEl, "::-webkit-scrollbar").display === "none" || "scrollbarWidth" in document.documentElement.style || "-ms-overflow-style" in document.documentElement.style) return 0; else return scrollbarWidth();
            } catch (e) {
                return scrollbarWidth();
            }
        };
        SimpleBarCore.getOffset = function(el) {
            var rect = el.getBoundingClientRect();
            var elDocument = getElementDocument(el);
            var elWindow = getElementWindow(el);
            return {
                top: rect.top + (elWindow.pageYOffset || elDocument.documentElement.scrollTop),
                left: rect.left + (elWindow.pageXOffset || elDocument.documentElement.scrollLeft)
            };
        };
        SimpleBarCore.prototype.init = function() {
            if (canUseDOM) {
                this.initDOM();
                this.rtlHelpers = SimpleBarCore.getRtlHelpers();
                this.scrollbarWidth = this.getScrollbarWidth();
                this.recalculate();
                this.initListeners();
            }
        };
        SimpleBarCore.prototype.initDOM = function() {
            var _a, _b;
            this.wrapperEl = this.el.querySelector(classNamesToQuery(this.classNames.wrapper));
            this.contentWrapperEl = this.options.scrollableNode || this.el.querySelector(classNamesToQuery(this.classNames.contentWrapper));
            this.contentEl = this.options.contentNode || this.el.querySelector(classNamesToQuery(this.classNames.contentEl));
            this.offsetEl = this.el.querySelector(classNamesToQuery(this.classNames.offset));
            this.maskEl = this.el.querySelector(classNamesToQuery(this.classNames.mask));
            this.placeholderEl = this.findChild(this.wrapperEl, classNamesToQuery(this.classNames.placeholder));
            this.heightAutoObserverWrapperEl = this.el.querySelector(classNamesToQuery(this.classNames.heightAutoObserverWrapperEl));
            this.heightAutoObserverEl = this.el.querySelector(classNamesToQuery(this.classNames.heightAutoObserverEl));
            this.axis.x.track.el = this.findChild(this.el, "".concat(classNamesToQuery(this.classNames.track)).concat(classNamesToQuery(this.classNames.horizontal)));
            this.axis.y.track.el = this.findChild(this.el, "".concat(classNamesToQuery(this.classNames.track)).concat(classNamesToQuery(this.classNames.vertical)));
            this.axis.x.scrollbar.el = ((_a = this.axis.x.track.el) === null || _a === void 0 ? void 0 : _a.querySelector(classNamesToQuery(this.classNames.scrollbar))) || null;
            this.axis.y.scrollbar.el = ((_b = this.axis.y.track.el) === null || _b === void 0 ? void 0 : _b.querySelector(classNamesToQuery(this.classNames.scrollbar))) || null;
            if (!this.options.autoHide) {
                addClasses(this.axis.x.scrollbar.el, this.classNames.visible);
                addClasses(this.axis.y.scrollbar.el, this.classNames.visible);
            }
        };
        SimpleBarCore.prototype.initListeners = function() {
            var _this = this;
            var _a;
            var elWindow = getElementWindow(this.el);
            this.el.addEventListener("mouseenter", this.onMouseEnter);
            this.el.addEventListener("pointerdown", this.onPointerEvent, true);
            this.el.addEventListener("mousemove", this.onMouseMove);
            this.el.addEventListener("mouseleave", this.onMouseLeave);
            (_a = this.contentWrapperEl) === null || _a === void 0 ? void 0 : _a.addEventListener("scroll", this.onScroll);
            elWindow.addEventListener("resize", this.onWindowResize);
            if (!this.contentEl) return;
            if (window.ResizeObserver) {
                var resizeObserverStarted_1 = false;
                var resizeObserver = elWindow.ResizeObserver || ResizeObserver;
                this.resizeObserver = new resizeObserver((function() {
                    if (!resizeObserverStarted_1) return;
                    elWindow.requestAnimationFrame((function() {
                        _this.recalculate();
                    }));
                }));
                this.resizeObserver.observe(this.el);
                this.resizeObserver.observe(this.contentEl);
                elWindow.requestAnimationFrame((function() {
                    resizeObserverStarted_1 = true;
                }));
            }
            this.mutationObserver = new elWindow.MutationObserver((function() {
                elWindow.requestAnimationFrame((function() {
                    _this.recalculate();
                }));
            }));
            this.mutationObserver.observe(this.contentEl, {
                childList: true,
                subtree: true,
                characterData: true
            });
        };
        SimpleBarCore.prototype.recalculate = function() {
            if (!this.heightAutoObserverEl || !this.contentEl || !this.contentWrapperEl || !this.wrapperEl || !this.placeholderEl) return;
            var elWindow = getElementWindow(this.el);
            this.elStyles = elWindow.getComputedStyle(this.el);
            this.isRtl = this.elStyles.direction === "rtl";
            var contentElOffsetWidth = this.contentEl.offsetWidth;
            var isHeightAuto = this.heightAutoObserverEl.offsetHeight <= 1;
            var isWidthAuto = this.heightAutoObserverEl.offsetWidth <= 1 || contentElOffsetWidth > 0;
            var contentWrapperElOffsetWidth = this.contentWrapperEl.offsetWidth;
            var elOverflowX = this.elStyles.overflowX;
            var elOverflowY = this.elStyles.overflowY;
            this.contentEl.style.padding = "".concat(this.elStyles.paddingTop, " ").concat(this.elStyles.paddingRight, " ").concat(this.elStyles.paddingBottom, " ").concat(this.elStyles.paddingLeft);
            this.wrapperEl.style.margin = "-".concat(this.elStyles.paddingTop, " -").concat(this.elStyles.paddingRight, " -").concat(this.elStyles.paddingBottom, " -").concat(this.elStyles.paddingLeft);
            var contentElScrollHeight = this.contentEl.scrollHeight;
            var contentElScrollWidth = this.contentEl.scrollWidth;
            this.contentWrapperEl.style.height = isHeightAuto ? "auto" : "100%";
            this.placeholderEl.style.width = isWidthAuto ? "".concat(contentElOffsetWidth || contentElScrollWidth, "px") : "auto";
            this.placeholderEl.style.height = "".concat(contentElScrollHeight, "px");
            var contentWrapperElOffsetHeight = this.contentWrapperEl.offsetHeight;
            this.axis.x.isOverflowing = contentElOffsetWidth !== 0 && contentElScrollWidth > contentElOffsetWidth;
            this.axis.y.isOverflowing = contentElScrollHeight > contentWrapperElOffsetHeight;
            this.axis.x.isOverflowing = elOverflowX === "hidden" ? false : this.axis.x.isOverflowing;
            this.axis.y.isOverflowing = elOverflowY === "hidden" ? false : this.axis.y.isOverflowing;
            this.axis.x.forceVisible = this.options.forceVisible === "x" || this.options.forceVisible === true;
            this.axis.y.forceVisible = this.options.forceVisible === "y" || this.options.forceVisible === true;
            this.hideNativeScrollbar();
            var offsetForXScrollbar = this.axis.x.isOverflowing ? this.scrollbarWidth : 0;
            var offsetForYScrollbar = this.axis.y.isOverflowing ? this.scrollbarWidth : 0;
            this.axis.x.isOverflowing = this.axis.x.isOverflowing && contentElScrollWidth > contentWrapperElOffsetWidth - offsetForYScrollbar;
            this.axis.y.isOverflowing = this.axis.y.isOverflowing && contentElScrollHeight > contentWrapperElOffsetHeight - offsetForXScrollbar;
            this.axis.x.scrollbar.size = this.getScrollbarSize("x");
            this.axis.y.scrollbar.size = this.getScrollbarSize("y");
            if (this.axis.x.scrollbar.el) this.axis.x.scrollbar.el.style.width = "".concat(this.axis.x.scrollbar.size, "px");
            if (this.axis.y.scrollbar.el) this.axis.y.scrollbar.el.style.height = "".concat(this.axis.y.scrollbar.size, "px");
            this.positionScrollbar("x");
            this.positionScrollbar("y");
            this.toggleTrackVisibility("x");
            this.toggleTrackVisibility("y");
        };
        SimpleBarCore.prototype.getScrollbarSize = function(axis) {
            var _a, _b;
            if (axis === void 0) axis = "y";
            if (!this.axis[axis].isOverflowing || !this.contentEl) return 0;
            var contentSize = this.contentEl[this.axis[axis].scrollSizeAttr];
            var trackSize = (_b = (_a = this.axis[axis].track.el) === null || _a === void 0 ? void 0 : _a[this.axis[axis].offsetSizeAttr]) !== null && _b !== void 0 ? _b : 0;
            var scrollbarRatio = trackSize / contentSize;
            var scrollbarSize;
            scrollbarSize = Math.max(~~(scrollbarRatio * trackSize), this.options.scrollbarMinSize);
            if (this.options.scrollbarMaxSize) scrollbarSize = Math.min(scrollbarSize, this.options.scrollbarMaxSize);
            return scrollbarSize;
        };
        SimpleBarCore.prototype.positionScrollbar = function(axis) {
            var _a, _b, _c;
            if (axis === void 0) axis = "y";
            var scrollbar = this.axis[axis].scrollbar;
            if (!this.axis[axis].isOverflowing || !this.contentWrapperEl || !scrollbar.el || !this.elStyles) return;
            var contentSize = this.contentWrapperEl[this.axis[axis].scrollSizeAttr];
            var trackSize = ((_a = this.axis[axis].track.el) === null || _a === void 0 ? void 0 : _a[this.axis[axis].offsetSizeAttr]) || 0;
            var hostSize = parseInt(this.elStyles[this.axis[axis].sizeAttr], 10);
            var scrollOffset = this.contentWrapperEl[this.axis[axis].scrollOffsetAttr];
            scrollOffset = axis === "x" && this.isRtl && ((_b = SimpleBarCore.getRtlHelpers()) === null || _b === void 0 ? void 0 : _b.isScrollOriginAtZero) ? -scrollOffset : scrollOffset;
            if (axis === "x" && this.isRtl) scrollOffset = ((_c = SimpleBarCore.getRtlHelpers()) === null || _c === void 0 ? void 0 : _c.isScrollingToNegative) ? scrollOffset : -scrollOffset;
            var scrollPourcent = scrollOffset / (contentSize - hostSize);
            var handleOffset = ~~((trackSize - scrollbar.size) * scrollPourcent);
            handleOffset = axis === "x" && this.isRtl ? -handleOffset + (trackSize - scrollbar.size) : handleOffset;
            scrollbar.el.style.transform = axis === "x" ? "translate3d(".concat(handleOffset, "px, 0, 0)") : "translate3d(0, ".concat(handleOffset, "px, 0)");
        };
        SimpleBarCore.prototype.toggleTrackVisibility = function(axis) {
            if (axis === void 0) axis = "y";
            var track = this.axis[axis].track.el;
            var scrollbar = this.axis[axis].scrollbar.el;
            if (!track || !scrollbar || !this.contentWrapperEl) return;
            if (this.axis[axis].isOverflowing || this.axis[axis].forceVisible) {
                track.style.visibility = "visible";
                this.contentWrapperEl.style[this.axis[axis].overflowAttr] = "scroll";
                this.el.classList.add("".concat(this.classNames.scrollable, "-").concat(axis));
            } else {
                track.style.visibility = "hidden";
                this.contentWrapperEl.style[this.axis[axis].overflowAttr] = "hidden";
                this.el.classList.remove("".concat(this.classNames.scrollable, "-").concat(axis));
            }
            if (this.axis[axis].isOverflowing) scrollbar.style.display = "block"; else scrollbar.style.display = "none";
        };
        SimpleBarCore.prototype.showScrollbar = function(axis) {
            if (axis === void 0) axis = "y";
            if (this.axis[axis].isOverflowing && !this.axis[axis].scrollbar.isVisible) {
                addClasses(this.axis[axis].scrollbar.el, this.classNames.visible);
                this.axis[axis].scrollbar.isVisible = true;
            }
        };
        SimpleBarCore.prototype.hideScrollbar = function(axis) {
            if (axis === void 0) axis = "y";
            if (this.isDragging) return;
            if (this.axis[axis].isOverflowing && this.axis[axis].scrollbar.isVisible) {
                dist_removeClasses(this.axis[axis].scrollbar.el, this.classNames.visible);
                this.axis[axis].scrollbar.isVisible = false;
            }
        };
        SimpleBarCore.prototype.hideNativeScrollbar = function() {
            if (!this.offsetEl) return;
            this.offsetEl.style[this.isRtl ? "left" : "right"] = this.axis.y.isOverflowing || this.axis.y.forceVisible ? "-".concat(this.scrollbarWidth, "px") : "0px";
            this.offsetEl.style.bottom = this.axis.x.isOverflowing || this.axis.x.forceVisible ? "-".concat(this.scrollbarWidth, "px") : "0px";
        };
        SimpleBarCore.prototype.onMouseMoveForAxis = function(axis) {
            if (axis === void 0) axis = "y";
            var currentAxis = this.axis[axis];
            if (!currentAxis.track.el || !currentAxis.scrollbar.el) return;
            currentAxis.track.rect = currentAxis.track.el.getBoundingClientRect();
            currentAxis.scrollbar.rect = currentAxis.scrollbar.el.getBoundingClientRect();
            if (this.isWithinBounds(currentAxis.track.rect)) {
                this.showScrollbar(axis);
                addClasses(currentAxis.track.el, this.classNames.hover);
                if (this.isWithinBounds(currentAxis.scrollbar.rect)) addClasses(currentAxis.scrollbar.el, this.classNames.hover); else dist_removeClasses(currentAxis.scrollbar.el, this.classNames.hover);
            } else {
                dist_removeClasses(currentAxis.track.el, this.classNames.hover);
                if (this.options.autoHide) this.hideScrollbar(axis);
            }
        };
        SimpleBarCore.prototype.onMouseLeaveForAxis = function(axis) {
            if (axis === void 0) axis = "y";
            dist_removeClasses(this.axis[axis].track.el, this.classNames.hover);
            dist_removeClasses(this.axis[axis].scrollbar.el, this.classNames.hover);
            if (this.options.autoHide) this.hideScrollbar(axis);
        };
        SimpleBarCore.prototype.onDragStart = function(e, axis) {
            var _a;
            if (axis === void 0) axis = "y";
            this.isDragging = true;
            var elDocument = getElementDocument(this.el);
            var elWindow = getElementWindow(this.el);
            var scrollbar = this.axis[axis].scrollbar;
            var eventOffset = axis === "y" ? e.pageY : e.pageX;
            this.axis[axis].dragOffset = eventOffset - (((_a = scrollbar.rect) === null || _a === void 0 ? void 0 : _a[this.axis[axis].offsetAttr]) || 0);
            this.draggedAxis = axis;
            addClasses(this.el, this.classNames.dragging);
            elDocument.addEventListener("mousemove", this.drag, true);
            elDocument.addEventListener("mouseup", this.onEndDrag, true);
            if (this.removePreventClickId === null) {
                elDocument.addEventListener("click", this.preventClick, true);
                elDocument.addEventListener("dblclick", this.preventClick, true);
            } else {
                elWindow.clearTimeout(this.removePreventClickId);
                this.removePreventClickId = null;
            }
        };
        SimpleBarCore.prototype.onTrackClick = function(e, axis) {
            var _this = this;
            var _a, _b, _c, _d;
            if (axis === void 0) axis = "y";
            var currentAxis = this.axis[axis];
            if (!this.options.clickOnTrack || !currentAxis.scrollbar.el || !this.contentWrapperEl) return;
            e.preventDefault();
            var elWindow = getElementWindow(this.el);
            this.axis[axis].scrollbar.rect = currentAxis.scrollbar.el.getBoundingClientRect();
            var scrollbar = this.axis[axis].scrollbar;
            var scrollbarOffset = (_b = (_a = scrollbar.rect) === null || _a === void 0 ? void 0 : _a[this.axis[axis].offsetAttr]) !== null && _b !== void 0 ? _b : 0;
            var hostSize = parseInt((_d = (_c = this.elStyles) === null || _c === void 0 ? void 0 : _c[this.axis[axis].sizeAttr]) !== null && _d !== void 0 ? _d : "0px", 10);
            var scrolled = this.contentWrapperEl[this.axis[axis].scrollOffsetAttr];
            var t = axis === "y" ? this.mouseY - scrollbarOffset : this.mouseX - scrollbarOffset;
            var dir = t < 0 ? -1 : 1;
            var scrollSize = dir === -1 ? scrolled - hostSize : scrolled + hostSize;
            var speed = 40;
            var scrollTo = function() {
                if (!_this.contentWrapperEl) return;
                if (dir === -1) {
                    if (scrolled > scrollSize) {
                        scrolled -= speed;
                        _this.contentWrapperEl[_this.axis[axis].scrollOffsetAttr] = scrolled;
                        elWindow.requestAnimationFrame(scrollTo);
                    }
                } else if (scrolled < scrollSize) {
                    scrolled += speed;
                    _this.contentWrapperEl[_this.axis[axis].scrollOffsetAttr] = scrolled;
                    elWindow.requestAnimationFrame(scrollTo);
                }
            };
            scrollTo();
        };
        SimpleBarCore.prototype.getContentElement = function() {
            return this.contentEl;
        };
        SimpleBarCore.prototype.getScrollElement = function() {
            return this.contentWrapperEl;
        };
        SimpleBarCore.prototype.removeListeners = function() {
            var elWindow = getElementWindow(this.el);
            this.el.removeEventListener("mouseenter", this.onMouseEnter);
            this.el.removeEventListener("pointerdown", this.onPointerEvent, true);
            this.el.removeEventListener("mousemove", this.onMouseMove);
            this.el.removeEventListener("mouseleave", this.onMouseLeave);
            if (this.contentWrapperEl) this.contentWrapperEl.removeEventListener("scroll", this.onScroll);
            elWindow.removeEventListener("resize", this.onWindowResize);
            if (this.mutationObserver) this.mutationObserver.disconnect();
            if (this.resizeObserver) this.resizeObserver.disconnect();
            this.onMouseMove.cancel();
            this.onWindowResize.cancel();
            this.onStopScrolling.cancel();
            this.onMouseEntered.cancel();
        };
        SimpleBarCore.prototype.unMount = function() {
            this.removeListeners();
        };
        SimpleBarCore.prototype.isWithinBounds = function(bbox) {
            return this.mouseX >= bbox.left && this.mouseX <= bbox.left + bbox.width && this.mouseY >= bbox.top && this.mouseY <= bbox.top + bbox.height;
        };
        SimpleBarCore.prototype.findChild = function(el, query) {
            var matches = el.matches || el.webkitMatchesSelector || el.mozMatchesSelector || el.msMatchesSelector;
            return Array.prototype.filter.call(el.children, (function(child) {
                return matches.call(child, query);
            }))[0];
        };
        SimpleBarCore.rtlHelpers = null;
        SimpleBarCore.defaultOptions = {
            forceVisible: false,
            clickOnTrack: true,
            scrollbarMinSize: 25,
            scrollbarMaxSize: 0,
            ariaLabel: "scrollable content",
            tabIndex: 0,
            classNames: {
                contentEl: "simplebar-content",
                contentWrapper: "simplebar-content-wrapper",
                offset: "simplebar-offset",
                mask: "simplebar-mask",
                wrapper: "simplebar-wrapper",
                placeholder: "simplebar-placeholder",
                scrollbar: "simplebar-scrollbar",
                track: "simplebar-track",
                heightAutoObserverWrapperEl: "simplebar-height-auto-observer-wrapper",
                heightAutoObserverEl: "simplebar-height-auto-observer",
                visible: "simplebar-visible",
                horizontal: "simplebar-horizontal",
                vertical: "simplebar-vertical",
                hover: "simplebar-hover",
                dragging: "simplebar-dragging",
                scrolling: "simplebar-scrolling",
                scrollable: "simplebar-scrollable",
                mouseEntered: "simplebar-mouse-entered"
            },
            scrollableNode: null,
            contentNode: null,
            autoHide: true
        };
        SimpleBarCore.getOptions = getOptions;
        SimpleBarCore.helpers = helpers;
        return SimpleBarCore;
    }();
    var extendStatics = function(d, b) {
        extendStatics = Object.setPrototypeOf || {
            __proto__: []
        } instanceof Array && function(d, b) {
            d.__proto__ = b;
        } || function(d, b) {
            for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p];
        };
        return extendStatics(d, b);
    };
    function __extends(d, b) {
        if (typeof b !== "function" && b !== null) throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() {
            this.constructor = d;
        }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __);
    }
    var _a = SimpleBarCore.helpers, dist_getOptions = _a.getOptions, dist_addClasses = _a.addClasses, dist_canUseDOM = _a.canUseDOM;
    var SimpleBar = function(_super) {
        __extends(SimpleBar, _super);
        function SimpleBar() {
            var args = [];
            for (var _i = 0; _i < arguments.length; _i++) args[_i] = arguments[_i];
            var _this = _super.apply(this, args) || this;
            SimpleBar.instances.set(args[0], _this);
            return _this;
        }
        SimpleBar.initDOMLoadedElements = function() {
            document.removeEventListener("DOMContentLoaded", this.initDOMLoadedElements);
            window.removeEventListener("load", this.initDOMLoadedElements);
            Array.prototype.forEach.call(document.querySelectorAll("[data-simplebar]"), (function(el) {
                if (el.getAttribute("data-simplebar") !== "init" && !SimpleBar.instances.has(el)) new SimpleBar(el, dist_getOptions(el.attributes));
            }));
        };
        SimpleBar.removeObserver = function() {
            var _a;
            (_a = SimpleBar.globalObserver) === null || _a === void 0 ? void 0 : _a.disconnect();
        };
        SimpleBar.prototype.initDOM = function() {
            var _this = this;
            var _a, _b, _c;
            if (!Array.prototype.filter.call(this.el.children, (function(child) {
                return child.classList.contains(_this.classNames.wrapper);
            })).length) {
                this.wrapperEl = document.createElement("div");
                this.contentWrapperEl = document.createElement("div");
                this.offsetEl = document.createElement("div");
                this.maskEl = document.createElement("div");
                this.contentEl = document.createElement("div");
                this.placeholderEl = document.createElement("div");
                this.heightAutoObserverWrapperEl = document.createElement("div");
                this.heightAutoObserverEl = document.createElement("div");
                dist_addClasses(this.wrapperEl, this.classNames.wrapper);
                dist_addClasses(this.contentWrapperEl, this.classNames.contentWrapper);
                dist_addClasses(this.offsetEl, this.classNames.offset);
                dist_addClasses(this.maskEl, this.classNames.mask);
                dist_addClasses(this.contentEl, this.classNames.contentEl);
                dist_addClasses(this.placeholderEl, this.classNames.placeholder);
                dist_addClasses(this.heightAutoObserverWrapperEl, this.classNames.heightAutoObserverWrapperEl);
                dist_addClasses(this.heightAutoObserverEl, this.classNames.heightAutoObserverEl);
                while (this.el.firstChild) this.contentEl.appendChild(this.el.firstChild);
                this.contentWrapperEl.appendChild(this.contentEl);
                this.offsetEl.appendChild(this.contentWrapperEl);
                this.maskEl.appendChild(this.offsetEl);
                this.heightAutoObserverWrapperEl.appendChild(this.heightAutoObserverEl);
                this.wrapperEl.appendChild(this.heightAutoObserverWrapperEl);
                this.wrapperEl.appendChild(this.maskEl);
                this.wrapperEl.appendChild(this.placeholderEl);
                this.el.appendChild(this.wrapperEl);
                (_a = this.contentWrapperEl) === null || _a === void 0 ? void 0 : _a.setAttribute("tabindex", this.options.tabIndex.toString());
                (_b = this.contentWrapperEl) === null || _b === void 0 ? void 0 : _b.setAttribute("role", "region");
                (_c = this.contentWrapperEl) === null || _c === void 0 ? void 0 : _c.setAttribute("aria-label", this.options.ariaLabel);
            }
            if (!this.axis.x.track.el || !this.axis.y.track.el) {
                var track = document.createElement("div");
                var scrollbar = document.createElement("div");
                dist_addClasses(track, this.classNames.track);
                dist_addClasses(scrollbar, this.classNames.scrollbar);
                track.appendChild(scrollbar);
                this.axis.x.track.el = track.cloneNode(true);
                dist_addClasses(this.axis.x.track.el, this.classNames.horizontal);
                this.axis.y.track.el = track.cloneNode(true);
                dist_addClasses(this.axis.y.track.el, this.classNames.vertical);
                this.el.appendChild(this.axis.x.track.el);
                this.el.appendChild(this.axis.y.track.el);
            }
            SimpleBarCore.prototype.initDOM.call(this);
            this.el.setAttribute("data-simplebar", "init");
        };
        SimpleBar.prototype.unMount = function() {
            SimpleBarCore.prototype.unMount.call(this);
            SimpleBar.instances["delete"](this.el);
        };
        SimpleBar.initHtmlApi = function() {
            this.initDOMLoadedElements = this.initDOMLoadedElements.bind(this);
            if (typeof MutationObserver !== "undefined") {
                this.globalObserver = new MutationObserver(SimpleBar.handleMutations);
                this.globalObserver.observe(document, {
                    childList: true,
                    subtree: true
                });
            }
            if (document.readyState === "complete" || document.readyState !== "loading" && !document.documentElement.doScroll) window.setTimeout(this.initDOMLoadedElements); else {
                document.addEventListener("DOMContentLoaded", this.initDOMLoadedElements);
                window.addEventListener("load", this.initDOMLoadedElements);
            }
        };
        SimpleBar.handleMutations = function(mutations) {
            mutations.forEach((function(mutation) {
                mutation.addedNodes.forEach((function(addedNode) {
                    if (addedNode.nodeType === 1) if (addedNode.hasAttribute("data-simplebar")) !SimpleBar.instances.has(addedNode) && document.documentElement.contains(addedNode) && new SimpleBar(addedNode, dist_getOptions(addedNode.attributes)); else addedNode.querySelectorAll("[data-simplebar]").forEach((function(el) {
                        if (el.getAttribute("data-simplebar") !== "init" && !SimpleBar.instances.has(el) && document.documentElement.contains(el)) new SimpleBar(el, dist_getOptions(el.attributes));
                    }));
                }));
                mutation.removedNodes.forEach((function(removedNode) {
                    var _a;
                    if (removedNode.nodeType === 1) if (removedNode.getAttribute("data-simplebar") === "init") !document.documentElement.contains(removedNode) && ((_a = SimpleBar.instances.get(removedNode)) === null || _a === void 0 ? void 0 : _a.unMount()); else Array.prototype.forEach.call(removedNode.querySelectorAll('[data-simplebar="init"]'), (function(el) {
                        var _a;
                        !document.documentElement.contains(el) && ((_a = SimpleBar.instances.get(el)) === null || _a === void 0 ? void 0 : _a.unMount());
                    }));
                }));
            }));
        };
        SimpleBar.instances = new WeakMap;
        return SimpleBar;
    }(SimpleBarCore);
    if (dist_canUseDOM) SimpleBar.initHtmlApi();
    if (document.querySelectorAll("[data-simplebar-c]").length) document.querySelectorAll("[data-simplebar]").forEach((scrollBlock => {
        const mediaQuery = scrollBlock.getAttribute("data-simplebar-media");
        if (mediaQuery) {
            const matchMediaQuery = window.matchMedia(`(max-width: ${mediaQuery / 16}em)`);
            if (matchMediaQuery.matches) new SimpleBar(scrollBlock, {});
            matchMediaQuery.addEventListener("change", (e => {
                if (e.matches) {
                    console.log("+");
                    new SimpleBar(scrollBlock, {
                        autoHide: false
                    });
                } else if (SimpleBar.instances.has(scrollBlock)) SimpleBar.instances.get(scrollBlock).unMount();
            }));
        } else new SimpleBar(scrollBlock, {
            autoHide: false
        });
    }));
    let addWindowScrollEvent = false;
    setTimeout((() => {
        if (addWindowScrollEvent) {
            let windowScroll = new Event("windowScroll");
            window.addEventListener("scroll", (function(e) {
                document.dispatchEvent(windowScroll);
            }));
        }
    }), 0);
    class DynamicAdapt {
        constructor(type) {
            this.type = type;
        }
        init() {
            this.оbjects = [];
            this.daClassname = "_dynamic_adapt_";
            this.nodes = [ ...document.querySelectorAll("[data-da]") ];
            this.nodes.forEach((node => {
                const data = node.dataset.da.trim();
                const dataArray = data.split(",");
                const оbject = {};
                оbject.element = node;
                оbject.parent = node.parentNode;
                const parentSelectorMatch = dataArray[0].trim().match(/^\{(.+)\}(?:\s*(.+)?)$/);
                if (parentSelectorMatch) {
                    const parentSelector = parentSelectorMatch[1].trim();
                    const childSelector = parentSelectorMatch[2] ? parentSelectorMatch[2].trim() : null;
                    const parentElement = node.closest(parentSelector);
                    if (parentElement) оbject.destination = childSelector ? parentElement.querySelector(childSelector) : parentElement;
                } else оbject.destination = document.querySelector(`${dataArray[0].trim()}`);
                оbject.breakpoint = dataArray[1] ? dataArray[1].trim() : "767.98";
                оbject.place = dataArray[2] ? dataArray[2].trim() : "last";
                оbject.index = this.indexInParent(оbject.parent, оbject.element);
                this.оbjects.push(оbject);
            }));
            this.arraySort(this.оbjects);
            this.mediaQueries = this.оbjects.map((({breakpoint}) => `(${this.type}-width: ${breakpoint / 16}em),${breakpoint}`)).filter(((item, index, self) => self.indexOf(item) === index));
            this.mediaQueries.forEach((media => {
                const mediaSplit = media.split(",");
                const matchMedia = window.matchMedia(mediaSplit[0]);
                const mediaBreakpoint = mediaSplit[1];
                const оbjectsFilter = this.оbjects.filter((({breakpoint}) => breakpoint === mediaBreakpoint));
                matchMedia.addEventListener("change", (() => {
                    this.mediaHandler(matchMedia, оbjectsFilter);
                }));
                this.mediaHandler(matchMedia, оbjectsFilter);
            }));
        }
        mediaHandler(matchMedia, оbjects) {
            if (matchMedia.matches) оbjects.forEach((оbject => {
                this.moveTo(оbject.place, оbject.element, оbject.destination);
            })); else оbjects.forEach((({parent, element, index}) => {
                if (element.classList.contains(this.daClassname)) this.moveBack(parent, element, index);
            }));
        }
        moveTo(place, element, destination) {
            if (!destination) return;
            element.classList.add(this.daClassname);
            if (place === "last" || place >= destination.children.length) {
                destination.append(element);
                return;
            }
            if (place === "first") {
                destination.prepend(element);
                return;
            }
            destination.children[place].before(element);
        }
        moveBack(parent, element, index) {
            element.classList.remove(this.daClassname);
            if (parent.children[index] !== void 0) parent.children[index].before(element); else parent.append(element);
        }
        indexInParent(parent, element) {
            return [ ...parent.children ].indexOf(element);
        }
        arraySort(arr) {
            if (this.type === "min") arr.sort(((a, b) => {
                if (a.breakpoint === b.breakpoint) {
                    if (a.place === b.place) return 0;
                    if (a.place === "first" || b.place === "last") return -1;
                    if (a.place === "last" || b.place === "first") return 1;
                    return 0;
                }
                return a.breakpoint - b.breakpoint;
            })); else {
                arr.sort(((a, b) => {
                    if (a.breakpoint === b.breakpoint) {
                        if (a.place === b.place) return 0;
                        if (a.place === "first" || b.place === "last") return 1;
                        if (a.place === "last" || b.place === "first") return -1;
                        return 0;
                    }
                    return b.breakpoint - a.breakpoint;
                }));
                return;
            }
        }
    }
    const da = new DynamicAdapt("max");
    da.init();
    document.addEventListener("click", (function(e) {
        if (e.target.closest(".up-button")) window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }));
    // const prgsElements = document.querySelectorAll("[data-prgs]");
    // prgsElements.forEach((prgsEl => {
    //         const total = +prgsEl.getAttribute("data-prgs");
    //         const active = +prgsEl.getAttribute("data-prgs-value");
    //         if (active <= total) for (let i = 0; i < total; i++) {
    //             const span = document.createElement("span");
    //             if (i < active) span.classList.add("_active");
    //             prgsEl.appendChild(span);
    //         } else console.log("Active value must be less than total" + prgsEl);
    // }));
    const codeInputs = document.querySelectorAll(".input-code");
    codeInputs.forEach((codeInput => {
        const inputs = codeInput.querySelectorAll("input");
        inputs.forEach(((input, index) => {
            input.addEventListener("input", (() => {
                if (input.value.length === 1 && index < inputs.length - 1) inputs[index + 1].focus();
            }));
            input.addEventListener("keydown", (e => {
                if (e.key === "Backspace" && input.value.length === 0 && index > 0) inputs[index - 1].focus();
            }));
        }));
    }));
    window["FLS"] = false;
    formRating();
})();

// document.getElementById('top-up-balance').addEventListener('click', function() {
//     document.getElementById('balance-modal').classList.remove('hidden');
// });

// document.getElementById('pay-button').addEventListener('click', function() {
//     let amount = document.getElementById('balance-amount').value;
//     if (amount > 0) {
//         window.location.href = `/balance/pay?amount=${amount}`;
//     } else {
//         alert('Введіть коректну суму!');
//     }
// });




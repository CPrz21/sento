function DropdownController() {
  var vm = this;

  vm.isCollapsed = true;
  vm.status = {
    isopen: false
  }
}

function tabsSwipeCtrlFn() {
    var responsive = this;
    responsive.ngIncludeTemplates = [
      { index: 0, name: 'first', url: urlTemplates+'special_gifts/gift_card.html' },
      { index: 1, name: 'second', url: urlTemplates+'special_gifts/gift_certificate.html' },
      { index: 2, name: 'third', url: urlTemplates+'special_gifts/member_card.html' }
    ];
    responsive.selectPage = selectPage;

    /**
    * Initialize with the first page opened
    */
    responsive.ngIncludeSelected = responsive.ngIncludeTemplates[0];

    /**
    * @name selectPage
    * @desc The function that includes the page of the indexSelected
    * @param indexSelected the index of the page to be included
    */
    function selectPage(indexSelected) {
        if (responsive.ngIncludeTemplates[indexSelected].index > responsive.ngIncludeSelected.index) {
            responsive.moveToLeft = false;
        } else {
            responsive.moveToLeft = true;
        }
        responsive.ngIncludeSelected = responsive.ngIncludeTemplates[indexSelected];
    }
}

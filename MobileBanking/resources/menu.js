
// moving the robot horizontally
$(window).on("load resize scroll", function() {
    var windowTop = $(window).scrollTop(); // Current scroll position
    var docHeight = $(document).height(); // Total document height
    var windowHeight = $(window).height(); // Window height
    var maxScroll = docHeight - windowHeight; // Maximum scrollable height
    var windowWidth = $(window).width(); // Window width
    var gearWidth = $(".gear").outerWidth(); // Width of the .gear element
    // Calculate the horizontal position as a ratio of scroll position to maximum scroll
    var horizontalPosition = (windowTop / maxScroll) * (windowWidth - gearWidth);
    $(".gear").css({ left: horizontalPosition });
});


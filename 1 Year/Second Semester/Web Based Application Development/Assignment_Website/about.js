
document.addEventListener('DOMContentLoaded', function () {
    // Get all counter elements
    var counters = document.querySelectorAll('.counter');

    // Function to increment the counter
    function updateCounter(counterElement, targetValue, incrementSpeed) {
        var currentValue = 0;

        function increment() {
            if (currentValue < targetValue) {
                currentValue++;
                counterElement.textContent = currentValue;
                setTimeout(increment, incrementSpeed);
            }
        }

        increment();
    }

    // Loop through each counter and update its value
    counters.forEach(function (counter) {
        var targetValue = parseInt(counter.textContent);
        counter.textContent = '0'; // Start the counter from 0

        updateCounter(counter, targetValue, 1); // You can adjust the increment speed (e.g., 20 milliseconds)
    });
});

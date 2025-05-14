
<div class="bg-wine text-white rounded-xl p-7 mx-auto mt-12 mb-8 w-4/5 text-left">
    <p class="mb-1">Thank you!</p>
    <p>Your payment is being verified by admin.<br>
        We will contact you via WhatsApp once confirmed.</p>
</div>
<div class="bg-wine text-white rounded-xl p-10 mx-auto mb-8 w-4/5 text-center">
    <h4 class="mb-4 text-xl font-medium">Rate Your Experience With Our Studio</h4>
    <div id="starContainer" class="mb-4">
        <i class="fas fa-star star text-gray-400 text-3xl cursor-pointer mx-1" data-value="1"></i>
        <i class="fas fa-star star text-gray-400 text-3xl cursor-pointer mx-1" data-value="2"></i>
        <i class="fas fa-star star text-gray-400 text-3xl cursor-pointer mx-1" data-value="3"></i>
        <i class="fas fa-star star text-gray-400 text-3xl cursor-pointer mx-1" data-value="4"></i>
        <i class="fas fa-star star text-gray-400 text-3xl cursor-pointer mx-1" data-value="5"></i>
    </div>
    <div class="mb-3">
        <textarea id="feedback" class="w-3/4 mx-auto p-2 rounded text-black h-36 resize-none" placeholder="Write your feedback..."></textarea>
    </div>
    <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded" onclick="submitRating()">Submit Rating</button>
</div>
<script>
    let selectedRating = 0;
    const stars = document.querySelectorAll('.star');
    stars.forEach(star => {
        star.addEventListener('click', function () {
            selectedRating = this.getAttribute('data-value');
            highlightStars(selectedRating);
        });
    });
    function highlightStars(rating) {
        stars.forEach(star => {
            if (parseInt(star.getAttribute('data-value')) <= rating) {
                star.classList.remove('text-gray-400');
                star.classList.add('text-yellow-400');
            } else {
                star.classList.add('text-gray-400');
                star.classList.remove('text-yellow-400');
            }
        });
    }
    function submitRating() {
        const feedback = document.getElementById('feedback').value;

        if (selectedRating == 0) {
            alert("Please select a star rating before submitting.");
            return;
        }
        fetch('/submit-rating', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                rating: selectedRating,
                feedback: feedback
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network error or server issue');
            }
            return response.json();
        })
        .then(data => {
            alert("Thank you for your rating!");
            selectedRating = 0;
            document.getElementById('feedback').value = "";
            highlightStars(0);
        })
        .catch(error => {
            alert("Error submitting rating: " + error.message);
        });
    }
</script>


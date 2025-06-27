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

<!-- Hidden input untuk order_id -->
@if(isset($order))
    <input type="hidden" id="order_id" value="{{ $order->code_order }}">
    <input type="hidden" id="room_id" value="{{ $order->room_id }}">
@else
    <input type="hidden" id="order_id" value="">
    <input type="hidden" id="room_id" value="">
@endif

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
        const orderId = document.getElementById('order_id').value;
        const roomId = document.getElementById('room_id').value;

        if (selectedRating == 0) {
            alert("Please select a star rating before submitting.");
            return;
        }
        
        if (!feedback.trim()) {
            alert("Please write your feedback before submitting.");
            return;
        }
        
        if (!orderId) {
            alert("Order ID tidak ditemukan. Silakan coba lagi.");
            return;
        }
        
        // Show loading state
        const submitBtn = document.querySelector('button[onclick="submitRating()"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Submitting...';
        submitBtn.disabled = true;
        
        fetch('/submit-rating', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                rating: selectedRating,
                feedback: feedback,
                order_id: orderId
            })
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => {
                    throw new Error(err.error || 'Network error or server issue');
                });
            }
            return response.json();
        })
        .then(data => {
            alert("Thank you for your rating!");
            selectedRating = 0;
            document.getElementById('feedback').value = "";
            highlightStars(0);
            
            // Redirect ke home setelah 2 detik
            setTimeout(() => {
                window.location.href = `/detail_studio_room/${roomId}`;
            }, 2000);
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Error submitting rating: " + error.message);
        })
        .finally(() => {
            // Reset button state
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        });
    }
</script>
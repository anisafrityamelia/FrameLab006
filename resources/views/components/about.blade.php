<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrameLab - Batam State Polytechnic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-primary { color: #your-primary-color; }
        .hover\:text-primary:hover { color: #your-primary-color; }
        .bg-primary { background-color: #your-primary-color; }
    </style>
</head>
<body class="font-sans">
    <section id="about" class="py-16 bg-gray-100">
        <h2 class="text-3xl font-bold text-center text-primary mb-10 drop-shadow-md">ABOUT US</h2>
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="w-full md:w-1/2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0686167298173!2d104.04537531475398!3d1.1191094990644058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98bf40e0c8d21%3A0x2e1a0b9a5c2f1e3d!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" class="w-full h-72 rounded-lg shadow-md" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="font-bold mb-2">Meet Us</p>
                            <p>
                                Batam State Polytechnic,<br>
                                Jalan Ahmad Yani, Teluk Tering Village,<br>
                                Batam City, Riau Islands, 29461.
                            </p>
                        </div>
                        <div>
                            <p class="font-bold mb-2">Contact</p>
                            <p>
                                <a href="tel:+15057922430" class="text-primary hover:underline">(505) 792-2430</a><br>
                                <a href="mailto:framelab@gmail.com" class="text-primary hover:underline">framelab@gmail.com</a>
                            </p>
                            <p class="font-bold mt-4 mb-2">Feedback</p>
                            <form>
                                <input type="text" name="note" placeholder="Write your feedback here!" required class="w-full p-2 mb-2 border rounded">
                                <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded text-sm transition-colors">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-white py-8" style="background-color: #5A0717;">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
              </div>
                <div class="text-center">
                    <div class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-6">
                        <div class="mt-2 text-gray-400 text-xs text-center">
                            <p>&copy; 2025 FrameLab - Batam State Polytechnic. All rights reserved.</p>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-6 text-sm mt-6">
                        <a href="#" class="text-gray-300 hover:text-primary transition-colors">Privacy Policy</a>
                        <a href="#" class="text-gray-300 hover:text-primary transition-colors">Terms of Service</a>
                        <a href="#" class="text-gray-300 hover:text-primary transition-colors">Cookie Policy</a>
                    </div>
                    <div class="mt-6 text-gray-400 text-xs">
                        <p>This website is developed and maintained by students of Batam State Polytechnic. 
                        All trademarks and logos are the property of their respective owners.</p>
                    </div>
                </div>
                <div></div>
            </div>
        </div>
    </footer>
</body>
</html>
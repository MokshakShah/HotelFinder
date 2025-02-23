const testimonials = [
    '"JourneyMadeEZ made planning our vacation so easy! Highly recommend!" - Sameer & Neha',
    '"I found the perfect hotel for my business trip thanks to JourneyMadeEZ!" - Walter White.',
    '"Great finds and outstanding customer service! Will definitely use again." - Harry Singh.'
];

let currentTestimonialIndex = 0;
const testimonialText = document.getElementById('testimonial-text');


function updateTestimonial() {
    testimonialText.classList.remove('visible'); // Hide current testimonial
    setTimeout(() => {
        currentTestimonialIndex = (currentTestimonialIndex + 1) % testimonials.length; // Move to next testimonial
        testimonialText.textContent = testimonials[currentTestimonialIndex]; // Update text
        testimonialText.classList.add('visible'); // Show new testimonial
    }, 1000); 
}


testimonialText.textContent = testimonials[0];
testimonialText.classList.add('visible');


setInterval(updateTestimonial, 5000);
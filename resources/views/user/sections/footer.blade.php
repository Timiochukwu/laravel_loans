</div>
</div>
</div>


<footer class="bg-gray-800 text-white flex justify-center items-center px-6 py-4">
    <p>&copy; 2024 Admin Dashboard. All Rights Reserved.</p>

</footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

<script>
    <script>
    function previewImage() {
        const fileInput = document.getElementById('profileImage');
        const imagePreview = document.getElementById('selectedImage');
        const profilePreview = document.getElementById('profilePreview');

        const file = fileInput.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = (e) => {
                imagePreview.src = e.target.result;
                profilePreview.src = e.target.result;
            };
            reader.readAsDataUrl(file);
        }

    }
</script>
</script>

<script>
    const profileButton = document.getElementById(' ');
    const profileDropdown = document.getElementById('profileDropdown');

        profileButton.addEventListener('click', () => {
        profileDropdown.classList.toggle('hidden');
    });
    window.addEventListener('click', (event) => {
        if (!profileDropdown.contains(event.target) && !profileButton.contains(event.target)){
            profileDropdown.classList.add('hidden');
    }
    });

</script>

<script>
function calculateInstallment() {
    const amountInput = document.getElementById('amount');
    const installmentCountsInput = document.getElementById('installment_counts');
    const installmentAmountInput = document.getElementById('installment_amout');
    const amountPlusTenPercentInput = document.getElementById('amount_plus_ten_percent')
    
    const amountValue = parseFloat(amountInput.value);
    const installmentCountsValue = parseFloat(installmentCountsInput.value);
    console.log(amountInput, installmentCountsValue);

if (!isNaN(amountValue) && !isNaN(installmentCountsValue) && installmentCountsValue != 0) {
    const installmentAmountValue = (amountValue * 1.1) / installmentCountsValue;
    const amountPlusTenPercentValue = amountValue * 1.1;
    
    installmentAmountInput.value = installmentAmountValue.toFixed(2);
    amountPlusTenPercentInput.value = amountPlusTenPercentValue.toFixed(2);
}else{
    installmentAmountInput.value =    '';
    amountPlusTenPercentInput.value = '';

}
}
</script>



</body>

</html>
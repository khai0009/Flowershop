const citySelect = document.getElementById('city');
const districtSelect = document.getElementById('district');
const wardSelect = document.getElementById('ward');

fetch('https://cdn.jsdelivr.net/gh/ThangLeQuoc/vietnamese-provinces-database/json/simplified_json_generated_data_vn_units_minified.json')
    .then(response => response.json())
    .then(data => {
        // Populate city dropdown
        data.forEach(City => {
            const option = document.createElement('option');
            option.value = City.Name;
            option.textContent = City.Name;
            citySelect.appendChild(option);
        });
        
        // City change event
        citySelect.addEventListener('change', function() {
            const selectedCity = this.value;
            districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>';
            wardSelect.innerHTML = '<option value="">Chọn phường/xã</option>';
            wardSelect.disabled = true;

            if (selectedCity) {
                const cityData = data.find(City => City.Name === selectedCity);
               
                cityData.District.forEach(District => {
                    const option = document.createElement('option');
                    option.value = District.Name;
                    option.textContent = District.Name;
                    districtSelect.appendChild(option);
                });
                districtSelect.disabled = false;
            } else {
                districtSelect.disabled = true;
            }
        });

        // District change event
        districtSelect.addEventListener('change', function() {
            const selectedCity = citySelect.value;
            const selectedDistrict = this.value;
            wardSelect.innerHTML = '<option value="">Chọn phường/xã</option>';

            if (selectedDistrict) {
                const cityData = data.find(city => city.Name === selectedCity);
                const districtData = cityData.District.find(District => District.Name === selectedDistrict);
                districtData.Ward.forEach(Ward => {
                    const option = document.createElement('option');
                    option.value = Ward.Name;
                    option.textContent = Ward.Name;
                    wardSelect.appendChild(option);
                });
                wardSelect.disabled = false;
            } else {
                wardSelect.disabled = true;
            }
        });
    });

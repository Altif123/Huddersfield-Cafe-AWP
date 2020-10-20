


                @csrf
                <div class="flex flex-wrap">
                    <label for="name" class="block text-red-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('Dish Name') }}:
                    </label>

                    <input id="dish_name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                           name="dish_name"  required autocomplete="dish_name" autofocus
                           placeholder=" E.G PERI chicken" value="{{ $item -> dish_name??''}}">

                    @error('dish_name')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="flex flex-wrap">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('Description') }}:
                    </label>

                    <input id="description"
                           class="form-input w-full @error('description') border-red-500 @enderror" name="description"
                          required autocomplete="description"
                           placeholder=" E.G Flame-grilled with crispy skin. Infused with PERi-PERi " value="{{old('description')??$item -> description??''}}">

                    @error('description')
                    <p class="text-green-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap">
                    <label for="allergy" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('Allergy ') }}:
                    </label>

                    <input id="allergy"
                           class="form-input w-full @error('description') border-red-500 @enderror" name="allergy"
                            required autocomplete="allergy"
                           placeholder=" E.G contains nuts " value="{{old('allergy')??$item -> allergy?? ''}}">

                    @error('allergy')
                    <p class="text-green-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="flex flex-wrap">
                    <label for="amount" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('Price') }}:
                    </label>

                    <input id="price" type="price"
                           class="form-input w-full @error('password') border-red-500 @enderror" name="price"
                           required autocomplete="price" placeholder="E.G 10.00" value="{{old('price')??$item -> price??''}}">

                    @error('price')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="flex flex-wrap">
                    <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                        Add/update menu item
                    </button>
                    </p>
                </div>

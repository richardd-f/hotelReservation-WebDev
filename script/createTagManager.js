const createTagManager = (config) => {
        const componentEl = document.getElementById(config.componentId);
        const inputEl = document.getElementById(config.inputId);
        const addBtn = document.getElementById(config.addBtnId);
        const tagsContainer = document.getElementById(config.tagsContainerId);
        const hiddenInput = document.getElementById(config.hiddenInputId);
        
        if (!componentEl || !inputEl || !addBtn || !tagsContainer || !hiddenInput) {
            // Silently return if any required element is not on the page.
            return { initialize: () => {} }; 
        }

        let tagsData = []; // This state is now local to each manager instance.

        const updateHiddenInput = () => {
            hiddenInput.value = JSON.stringify(tagsData);
        };

        const makeTagEditable = (tagTextElement, tagId) => {
            const originalText = tagTextElement.textContent;
            tagTextElement.contentEditable = true;
            tagTextElement.focus();
            tagTextElement.classList.add('tag-text-editing');

            const finishEditing = () => {
                const newText = tagTextElement.textContent.trim();
                tagTextElement.contentEditable = false;
                tagTextElement.classList.remove('tag-text-editing');
                if (newText && newText !== originalText) {
                    const tag = tagsData.find(t => String(t.id) === String(tagId));
                    if (tag) {
                        tag.name = newText;
                        updateHiddenInput();
                    }
                } else {
                    tagTextElement.textContent = originalText;
                }
                tagTextElement.removeEventListener('keydown', handleKeyDown);
                tagTextElement.removeEventListener('blur', finishEditing);
            };

            const handleKeyDown = (e) => {
                if (e.key === 'Enter') e.preventDefault();
                if (e.key === 'Enter' || e.key === 'Escape') {
                    if (e.key === 'Escape') tagTextElement.textContent = originalText;
                    finishEditing();
                }
            };
            tagTextElement.addEventListener('keydown', handleKeyDown);
            tagTextElement.addEventListener('blur', finishEditing);
        };

        const addTag = (tagObject) => {
            const tag = document.createElement('div');
            tag.className = 'flex items-center bg-brand-black text-brand-gold text-sm font-medium px-3 py-1 rounded-full border border-brand-gold animate-scale-in';
            tag.dataset.id = tagObject.id;

            const tagText = document.createElement('span');
            tagText.textContent = tagObject.name;
            tagText.className = 'cursor-pointer';
            tagText.addEventListener('click', () => makeTagEditable(tagText, tagObject.id));
            tag.appendChild(tagText);

            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.className = 'ml-2 text-brand-gold hover:text-white focus:outline-none';
            deleteBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>`;
            
            deleteBtn.addEventListener('click', () => {
                const idToDelete = tag.dataset.id;
                tagsData = tagsData.filter(t => String(t.id) !== idToDelete);
                updateHiddenInput();
                tag.classList.add('animate-scale-out');
                tag.addEventListener('animationend', () => tag.remove());
            });

            deleteBtn.addEventListener('click', () => {
                const idToDelete = tag.dataset.id;
                console.log('Deleting tag with ID:', idToDelete);
                
                // Remove from data array
                tagsData = tagsData.filter(t => String(t.id) !== idToDelete);
                updateHiddenInput();
                
                // Simple fade out effect using inline styles
                tag.style.transition = 'opacity 0.3s ease';
                tag.style.opacity = '0';
                
                setTimeout(() => tag.remove(), 300);
            });

            tag.appendChild(deleteBtn);
            tagsContainer.appendChild(tag);
        };

        const handleAddNew = () => {
            const newName = inputEl.value.trim();
            if (newName && !tagsData.some(t => t.name === newName)) {
                const newTag = { id: `${config.newIdPrefix}_${Date.now()}`, name: newName };
                tagsData.push(newTag);
                updateHiddenInput();
                addTag(newTag);
                inputEl.value = '';
                inputEl.focus();
            } else {
                inputEl.value = '';
            }
        };

        const initialize = () => {
            tagsContainer.innerHTML = '';
            tagsData = [];
            const initialDataString = componentEl.dataset[config.initialDataKey];
            if (initialDataString) {
                try {
                    const initialData = JSON.parse(initialDataString);
                    tagsData = initialData;
                    tagsData.forEach(addTag);
                    updateHiddenInput();
                } catch (e) {
                    console.error(`Failed to parse initial data for ${config.componentId}:`, e);
                }
            }
        };

        addBtn.addEventListener('click', handleAddNew);
        inputEl.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                handleAddNew();
            }
        });
        
        // Return the initialize function so it can be called from outside.
        return { initialize };
    };
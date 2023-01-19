<div>

    <h1>sdf</h1>
    <div x-data="{ active: 0, items: $wire.get('items') }">

        <template x-for="(item, index) in items" :key="index">

            <div x-data="{
                  get expanded() { return this.active === this.index },
                  set expanded(value) { this.active = value ? this.index : null },
              }" role="region" class="bx">

                <h3 class="txt-lg">
                    <button x-on:click="expanded = !expanded" :aria-expanded="expanded" class="flex space-between w-full tal">
                        <span x-text="item.title"></span>
                        <span x-show="expanded" aria-hidden="true" class="fw-9"><span class="txt-muted txt-xl">&minus;</span></span>
                        <span x-show="!expanded" aria-hidden="true" class="fw-9"><span class="txt-muted txt-xl">&plus;</span></span>
                    </button>
                </h3>

                <div x-text="item.body" x-show="expanded"></div>
            </div>

        </template>

    </div>


</div>

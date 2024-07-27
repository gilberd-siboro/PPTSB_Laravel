@extends('layout.sektor.dash')
@section('content')

<div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
    <ul class="flex flex-wrap items-center gap-2 mb-3 font-normal text-15">
        <li
            class="relative before:content-['\ea54'] before:font-remix before:ltr:-right-1 before:rtl:-left-1 before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:rtl:rotate-180 before:text-slate-500 dark:before:text-zink-200">
            <a href="/admin-pengumuman" class="text-slate-500 dark:text-zink-200">Pengumuman</a>
        </li>
        <li class="text-slate-700 dark:text-zink-100">
            Edit Pengumuman
        </li>
    </ul>
</div>

<div id="Edit" modal-center=""
    class="fixed flex flex-col  transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4"
    style="margin-top: 50px;">
    <div class="w-screen lg:w-[55rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full mt-6">
        <div class="flex items-center justify-beSTEen p-4 border-b dark:border-zink-500">
            <h5 class="text-16" id="addEmployeeLabel">Edit Pengumuman</h5>
        </div>
        <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
            <form class="create-form" id="create-form" action="/edit-pengumuman/{{$kegiatan->id_kegiatan}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div id="alert-error-msg"
                    class="hidden px-4 py-3 text-sm text-red-500 border border-transparent rounded-md bg-red-50 dark:bg-red-500/20">
                </div>
                <d iv class="grid grid-cols-1 gap-4 xl:grid-cols-12">
                    <div class="xl:col-span-6">
                        <label for="status" class="inline-block mb-2 text-base font-medium">Nama Pengumuman</label>
                        <input value="{{$kegiatan->nama_kegiatan}}" type="text" id="nama_kegiatan" name="nama_kegiatan"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="nama pengumuman" required>
                    </div>
                    <div class="xl:col-span-6">
                        <label for="status" class="inline-block mb-2 text-base font-medium">Nama Aksi Sosial</label>
                        <input value="{{$kegiatan->nama_aksi_sosial}}" type="text" id="nama_aksi_sosial" name="nama_aksi_sosial"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="nama pengumuman" required>
                    </div>
                    <div class="xl:col-span-6">
                        <label for="foto" class="inline-block mb-2 text-base font-medium">Gambar</label>
                        <div>
                            <input type="file" name="gambar" id="gambar"
                                class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                                placeholder="Foto">
                            <input type="hidden" name="current_gambar" value="{{$kegiatan->gambar}}">
                            <span id="current-gambar-label" class="text-sm text-slate-500 dark:text-zink-200">Gambar
                                Sekarang: {{$kegiatan->gambar}}</span>
                            <!-- Menampilkan gambar saat ini -->
                            <div id="current-image-container" class="mt-2">
                                <img src="/assets/gambar/{{$kegiatan->gambar}}" id="current-image" alt="Current Image"
                                    class="w-24 h-auto">
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6">
                        <label for="joiningDateInput" class="inline-block mb-2 text-base font-medium">Tanggal</label>
                        <input value="{{$kegiatan->tanggal}}" type="text" id="joiningDateInput" name="tanggal"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Select date" data-provider="flatpickr" data-date-format="d M, Y" required>
                    </div>
                    <div class="xl:col-span-6">
                        <label for="eventTimeInput" class="inline-block mb-2 text-base font-medium">Waktu</label>
                        <input type="text" name="waktu" value="{{$kegiatan->waktu}}"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 flatpickr-input"
                            id="eventTimeInput" data-provider="timepickr" data-time-basic="true" placeholder="waktu"
                            required>
                    </div>
                    <div class="xl:col-span-6">
                        <label for="eventTimeInput" class="inline-block mb-2 text-base font-medium">Tempat</label>
                        <input type="text" name="tempat" value="{{$kegiatan->tempat}}"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 flatpickr-input"
                            id="eventTimeInput" data-provider="" data-time-basic="true" placeholder="Tempat" required>
                    </div>
                    <div class="md:col-span-2 xl:col-span-6">
                        <div>
                            <label for="reasonInput" class="inline-block mb-2 text-base font-medium">Jumlah
                                Bantuan</label>
                            <input type="number" value="{{$kegiatan->jumlah_bantuan}}" id="phoneNumberInput" value="jumlah_bantuan" name="jumlah_bantuan"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="jumlah bantuan" required>
                            <p id="phoneNumberError" class="mt-1 text-sm text-red-500"></p>
                        </div>
                    </div>

                    <div class="md:col-span-2 xl:col-span-6">
                        <div>
                            <label for="reasonInput" class="inline-block mb-2 text-base font-medium">Keterangan</label>
                            <input value="{{$kegiatan->keterangan}}" type="text" id="keterangan" name="keterangan"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="keterangan" required>
                        </div>
                    </div>

                    <div class="md:col-span-2 xl:col-span-6">
                        <label for="jenisStatus" class="inline-block mb-2 text-base font-medium">Nama Anggota</label>
                        <select   name="id_anggota" id="id_anggota" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" name="id_jenis_status" id="id_jenis_status">
                            <option value="">Pilih Jenis Status</option>
                            @foreach($anggota as $d)
                            <option value="{{ $d->id_anggota }}" {{ $d->id_anggota == $d->id_anggota ? 'selected' : '' }}>{{ $d->nama_depan }}</option>
                            @endforeach
                        </select>
                    </div>
                </d>
                <div class="flex justify-end gap-2 mt-4">
                    <a href="/admin-pengumuman"
                        class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-600 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">
                        Cancel
                    </a>
                    <button type="submit" id="addNew"
                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Edit
                        pengumuman</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- SETINGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG -->
<div class="fixed items-center hidden bottom-6 right-12 h-header group-data-[navbar=hidden]:flex">
    <button data-drawer-target="customizerButton" type="button"
        class="inline-flex items-center justify-center w-12 h-12 p-0 transition-all duration-200 ease-linear rounded-md shadow-lg text-sky-50 bg-sky-500">
        <i data-lucide="settings" class="inline-block w-5 h-5"></i>
    </button>
</div>

<div id="customizerButton" drawer-end=""
    class="fixed inset-y-0 flex flex-col w-full transition-transform duration-300 ease-in-out transform bg-white shadow ltr:right-0 rtl:left-0 md:w-96 z-drawer show dark:bg-zink-600">
    <div class="flex justify-beSTEen p-4 border-b border-slate-200 dark:border-zink-500">
        <div class="grow">
            <h5 class="mb-1 text-16">PPTSB Theme Customizer</h5>
            <p class="font-normal text-slate-500 dark:text-zink-200">Choose your themes & layouts etc.</p>
        </div>
        <div class="shrink-0">
            <button data-drawer-close="customizerButton"
                class="transition-all duration-150 ease-linear text-slate-500 hover:text-slate-800 dark:text-zink-200 dark:hover:text-zink-50"><i
                    data-lucide="x" class="w-4 h-4"></i></button>
        </div>
    </div>
    <div class="h-full p-6 overflow-y-auto">
        <div>
            <h5 class="mb-3 underline capitalize text-15">Choose Layouts</h5>
            <div class="grid grid-cols-1 mb-5 gap-7 sm:grid-cols-2">
                <div class="relative">
                    <input id="layout-one" name="dataLayout"
                        class="absolute w-4 h-4 border rounded-full appearance-none cursor-pointer ltr:right-2 rtl:left-2 top-2 vertical-menu-btn bg-slate-100 border-slate-300 checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500"
                        type="radio" value="vertical" checked="">
                    <label
                        class="block w-full h-24 p-0 overflow-hidden border rounded-lg cursor-pointer border-slate-200 dark:border-zink-500"
                        for="layout-one">
                        <span class="flex h-full gap-0">
                            <span class="shrink-0">
                                <span
                                    class="flex flex-col h-full gap-1 p-1 ltr:border-r rtl:border-l border-slate-200 dark:border-zink-500">
                                    <span class="block p-1 px-2 mb-2 rounded bg-slate-100 dark:bg-zink-400"></span>
                                    <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                    <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                    <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                </span>
                            </span>
                            <span class="grow">
                                <span class="flex flex-col h-full">
                                    <span class="block h-3 bg-slate-100 dark:bg-zink-500"></span>
                                    <span class="block h-3 mt-auto bg-slate-100 dark:bg-zink-500"></span>
                                </span>
                            </span>
                        </span>
                    </label>
                    <h5 class="mt-2 text-center text-15">Vertical</h5>
                </div>

                <div class="relative">
                    <input id="layout-two" name="dataLayout"
                        class="absolute w-4 h-4 border rounded-full appearance-none cursor-pointer ltr:right-2 rtl:left-2 top-2 vertical-menu-btn bg-slate-100 border-slate-300 checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500"
                        type="radio" value="horizontal">
                    <label
                        class="block w-full h-24 p-0 overflow-hidden border rounded-lg cursor-pointer border-slate-200 dark:border-zink-500"
                        for="layout-two">
                        <span class="flex flex-col h-full gap-1">
                            <span class="flex items-center gap-1 p-1 bg-slate-100 dark:bg-zink-500">
                                <span class="block p-1 ml-1 bg-white rounded dark:bg-zink-500"></span>
                                <span class="block p-1 px-2 pb-0 bg-white dark:bg-zink-500 ms-auto"></span>
                                <span class="block p-1 px-2 pb-0 bg-white dark:bg-zink-500"></span>
                            </span>
                            <span class="block p-1 bg-slate-100 dark:bg-zink-500"></span>
                            <span class="block p-1 mt-auto bg-slate-100 dark:bg-zink-500"></span>
                        </span>
                    </label>
                    <h5 class="mt-2 text-center text-15">Horizontal</h5>
                </div>
            </div>

            <div id="semi-dark">
                <div class="flex items-center">
                    <div class="relative inline-block w-10 mr-2 align-middle transition duration-200 ease-in">
                        <input type="checkbox" name="customDefaultSwitch" value="dark" id="customDefaultSwitch"
                            class="absolute block w-5 h-5 transition duration-300 ease-linear border-2 rounded-full appearance-none cursor-pointer border-slate-200 bg-white/80 peer/published checked:bg-white checked:right-0 checked:border-custom-500 arrow-none dark:border-zink-500 dark:bg-zink-500 dark:checked:bg-zink-400 checked:bg-none">
                        <label for="customDefaultSwitch"
                            class="block h-5 overflow-hidden transition duration-300 ease-linear border rounded-full cursor-pointer border-slate-200 bg-slate-200 peer-checked/published:bg-custom-500 peer-checked/published:border-custom-500 dark:border-zink-500 dark:bg-zink-600"></label>
                    </div>
                    <label for="customDefaultSwitch" class="inline-block text-base font-medium">Semi Dark (Sidebar &
                        Header)</label>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <!-- data-skin="" -->
            <h5 class="mb-3 underline capitalize text-15">Skin Layouts</h5>
            <div class="grid grid-cols-1 mb-5 gap-7 sm:grid-cols-2">
                <div class="relative">
                    <input id="layoutSkitOne" name="dataLayoutSkin"
                        class="absolute w-4 h-4 border rounded-full appearance-none cursor-pointer ltr:right-2 rtl:left-2 top-2 vertical-menu-btn bg-slate-100 border-slate-300 checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500"
                        type="radio" value="default">
                    <label
                        class="block w-full h-24 p-0 overflow-hidden border rounded-lg cursor-pointer border-slate-200 dark:border-zink-500 bg-slate-50 dark:bg-zink-600"
                        for="layoutSkitOne">
                        <span class="flex h-full gap-0">
                            <span class="shrink-0">
                                <span
                                    class="flex flex-col h-full gap-1 p-1 ltr:border-r rtl:border-l border-slate-200 dark:border-zink-500">
                                    <span class="block p-1 px-2 mb-2 rounded bg-slate-100 dark:bg-zink-400"></span>
                                    <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                    <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                    <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                </span>
                            </span>
                            <span class="grow">
                                <span class="flex flex-col h-full">
                                    <span class="block h-3 bg-slate-100 dark:bg-zink-500"></span>
                                    <span class="block h-3 mt-auto bg-slate-100 dark:bg-zink-500"></span>
                                </span>
                            </span>
                        </span>
                    </label>
                    <h5 class="mt-2 text-center text-15">Default</h5>
                </div>

                <div class="relative">
                    <input id="layoutSkitTwo" name="dataLayoutSkin"
                        class="absolute w-4 h-4 border rounded-full appearance-none cursor-pointer ltr:right-2 rtl:left-2 top-2 vertical-menu-btn bg-slate-100 border-slate-300 checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500"
                        type="radio" value="bordered" checked="">
                    <label
                        class="block w-full h-24 p-0 overflow-hidden border rounded-lg cursor-pointer border-slate-200 dark:border-zink-500"
                        for="layoutSkitTwo">
                        <span class="flex h-full gap-0">
                            <span class="shrink-0">
                                <span
                                    class="flex flex-col h-full gap-1 p-1 ltr:border-r rtl:border-l border-slate-200 dark:border-zink-500">
                                    <span class="block p-1 px-2 mb-2 rounded bg-slate-100 dark:bg-zink-400"></span>
                                    <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                    <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                    <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                </span>
                            </span>
                            <span class="grow">
                                <span class="flex flex-col h-full">
                                    <span class="block h-3 border-b border-slate-200 dark:border-zink-500"></span>
                                    <span
                                        class="block h-3 mt-auto border-t border-slate-200 dark:border-zink-500"></span>
                                </span>
                            </span>
                        </span>
                    </label>
                    <h5 class="mt-2 text-center text-15">Bordered</h5>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <!-- data-mode="" -->
            <h5 class="mb-3 underline capitalize text-15">Light & Dark</h5>
            <div class="flex gap-3">
                <button type="button" id="dataModeOne" name="dataMode" value="light"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">Light
                    Mode</button>
                <button type="button" id="dataModeTwo" name="dataMode" value="dark"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Dark
                    Mode</button>
            </div>
        </div>

        <div class="mt-6">
            <!-- dir="ltr" -->
            <h5 class="mb-3 underline capitalize text-15">LTR & RTL</h5>
            <div class="flex flex-wrap gap-3">
                <button type="button" id="diractionOne" name="dir" value="ltr"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">LTR
                    Mode</button>
                <button type="button" id="diractionTwo" name="dir" value="rtl"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">RTL
                    Mode</button>
            </div>
        </div>

        <div class="mt-6">
            <!-- data-content -->
            <h5 class="mb-3 underline capitalize text-15">Content Width</h5>
            <div class="flex gap-3">
                <button type="button" id="datawidthOne" name="datawidth" value="fluid"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">Fluid</button>
                <button type="button" id="datawidthTwo" name="datawidth" value="boxed"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Boxed</button>
            </div>
        </div>

        <div class="mt-6" id="sidebar-size">
            <!-- data-sidebar-size="" -->
            <h5 class="mb-3 underline capitalize text-15">Sidebar Size</h5>
            <div class="flex flex-wrap gap-3">
                <button type="button" id="sidebarSizeOne" name="sidebarSize" value="lg"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">Default</button>
                <button type="button" id="sidebarSizeTwo" name="sidebarSize" value="md"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Compact</button>
                <button type="button" id="sidebarSizeThree" name="sidebarSize" value="sm"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Small
                    (Icon)</button>
            </div>
        </div>

        <div class="mt-6" id="navigation-type">
            <!-- data-navbar="" -->
            <h5 class="mb-3 underline capitalize text-15">Navigation Type</h5>
            <div class="flex flex-wrap gap-3">
                <button type="button" id="navbarTwo" name="navbar" value="sticky"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">Sticky</button>
                <button type="button" id="navbarOne" name="navbar" value="scroll"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Scroll</button>
                <button type="button" id="navbarThree" name="navbar" value="bordered"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Bordered</button>
                <button type="button" id="navbarFour" name="navbar" value="hidden"
                    class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">Hidden</button>
            </div>
        </div>

        <div class="mt-6" id="sidebar-color">
            <!-- data-sidebar="" light, dark, brand, modern-->
            <h5 class="mb-3 underline capitalize text-15">Sizebar Colors</h5>
            <div class="flex flex-wrap gap-3">
                <button type="button" id="sidebarColorOne" name="sidebarColor" value="light"
                    class="flex items-center justify-center w-10 h-10 bg-white border rounded-md border-slate-200 group active"><i
                        data-lucide="check"
                        class="w-5 h-5 hidden group-[.active]:inline-block text-slate-600"></i></button>
                <button type="button" id="sidebarColorTwo" name="sidebarColor" value="dark"
                    class="flex items-center justify-center w-10 h-10 border rounded-md border-zink-900 bg-zink-900 group"><i
                        data-lucide="check" class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i></button>
                <button type="button" id="sidebarColorThree" name="sidebarColor" value="brand"
                    class="flex items-center justify-center w-10 h-10 border rounded-md border-custom-800 bg-custom-800 group"><i
                        data-lucide="check" class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i></button>
                <button type="button" id="sidebarColorFour" name="sidebarColor" value="modern"
                    class="flex items-center justify-center w-10 h-10 border rounded-md border-purple-950 bg-gradient-to-t from-red-400 to-purple-500 group"><i
                        data-lucide="check" class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i></button>
            </div>
        </div>

        <div class="mt-6">
            <!-- data-topbar="" light, dark, brand, modern-->
            <h5 class="mb-3 underline capitalize text-15">Topbar Colors</h5>
            <div class="flex flex-wrap gap-3">
                <button type="button" id="topbarColorOne" name="topbarColor" value="light"
                    class="flex items-center justify-center w-10 h-10 bg-white border rounded-md border-slate-200 group active"><i
                        data-lucide="check"
                        class="w-5 h-5 hidden group-[.active]:inline-block text-slate-600"></i></button>
                <button type="button" id="topbarColorTwo" name="topbarColor" value="dark"
                    class="flex items-center justify-center w-10 h-10 border rounded-md border-zink-900 bg-zink-900 group"><i
                        data-lucide="check" class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i></button>
                <button type="button" id="topbarColorThree" name="topbarColor" value="brand"
                    class="flex items-center justify-center w-10 h-10 border rounded-md border-custom-800 bg-custom-800 group"><i
                        data-lucide="check" class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i></button>
            </div>
        </div>

    </div>
    <div class="flex items-center justify-beSTEen gap-3 p-4 border-t border-slate-200 dark:border-zink-500">
        <button type="button" id="reset-layout"
            class="w-full transition-all duration-200 ease-linear text-slate-500 btn bg-slate-200 border-slate-200 hover:text-slate-600 hover:bg-slate-300 hover:border-slate-300 focus:text-slate-600 focus:bg-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-100">Reset</button>
    </div>
</div>
@endsection
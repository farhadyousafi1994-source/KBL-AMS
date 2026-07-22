@extends('layout.master')

@section('content')
<div class="container mt-12">
    {{-- Header --}}
    <div class="text-center mb-4">
        <table class="w-100 border-0"  width="100%"  border="0">
            <tr>
                <td align="right" valign="top">
                    <img src="{{ asset('images/logo.png') }}" width="120" height="120">
                </td>
                <td align="center" dir="rtl">
                    <strong>
                        <div>امارت اسلامی افغانستان</div>
                        <div>وزارت تحصیلات عالی</div>
                        <div>ریاست پوهنتون کابل</div>
                        <div>معاونیت مالی اداری</div>
                        <div>آمریت تکنالوژی معلوماتی</div>
                    </strong>
                </td>
                <td align="left" valign="top">
                    <img src="{{ asset('images/gov.jpg') }}" width="120" height="120">
                </td>
            </tr>
        </table>
        <hr>
        <h3 class="mt-3">سیستم ثبت ذمت کارمندان</h3>
    </div>

    {{-- Asset Registration Form --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">اضافه نمودن ذمت جدید</div>
        <div class="card-body">
            <form action="{{ action('UnassetController@store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col"><input type="text" name="emp_id" class="form-control" placeholder="نمبر هویت"   ></div>
                    <div class="col"><input type="text" name="emp_name" class="form-control" placeholder="تحویل گیرنده"    ></div>
                </div>
                <div class="row mb-3">
                    <div class="col"><input type="text" name="account_pay" class="form-control" placeholder="تخویل دهنده"    ></div>
                    <div class="col"><input type="text" name="emp_faculty" class="form-control" placeholder="ریاست مربوطه"  ></div>
                </div>
                <div class="row mb-3">
                    <div class="col"><input type="text" name="emp_dep" class="form-control" placeholder="دیپارتمنت"    ></div>
                </div>
  <div class="col">
      
      <input type="date" name="import_date"   class="form-control" placeholder="  تاریخ ورد"  >
      </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>اسم جنس</label>
                        <select name="item_name" class="form-control">
                  @foreach($info as $dabs )
                                <option>{{ $dabs->item_name }}</option>
               @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label>کتگوری جنس</label>
                        <select name="item_dep" class="form-control">
                     @foreach($info as $dabs )
                                <option>{{ $dabs->item_dep }}</option>
                      @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label>مشخصات جنس</label>
                        <select name="item_detail" class="form-control">
                      @foreach($info as $dabs )
                                <option>{{ $dabs->item_detail }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col"><input type="text" name="item_quantity" class="form-control" placeholder="تعداد"></div>
                    <div class="col"><input type="text" name="item_cost" class="form-control" placeholder="قیمت"></div>
                </div>

                <div class="mb-3">
                    <label>فایل پیوست</label>
                    <input type="file" name="file" class="form-control">
                </div>

                <div class="mb-3">
                    <input type="text" name="status" class="form-control" readonly placeholder="حالت" value="1">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">ثبت</button>
                </div>
            </form>
        </div>
    </div>

 

{{-- Client-side Search Script --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("itemSearch");
        const tableRows = document.querySelectorAll("#itemTableBody tr");

        searchInput.addEventListener("input", function() {
            const query = this.value.toLowerCase();

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? "" : "none";
            });
        });
    });
</script>
@endsection
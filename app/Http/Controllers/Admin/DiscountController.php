<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountCreateRequest;
use App\Http\Requests\DiscountUpdateRequest;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(Request $request)
    {
        $query = Discount::query();
        $countDeleted = Discount::onlyTrashed()->count();

        if ($request->input('deleted') == 'daxoa') {
            $getDelete = Discount::onlyTrashed()->paginate(10);
            $config = 'deleted';
            return view('admin.discounts.index', compact('countDeleted', 'config', 'getDelete'));
        } else {
            if ($request->has('search')) {
                $query->where('code', 'like', '%' . $request->search . '%');
            }
            $discounts = $query->paginate(10);
            $config = 'index';
        }

        return view('admin.discounts.index', compact('discounts', 'countDeleted', 'config'));
    }

    public function create()
    {
        return view('admin.discounts.create');
    }

    public function store(DiscountCreateRequest $request)
    {
        $discount = Discount::create($request->validated() + ['status' => $request->status]);

        if ($discount) {
            toastr()->success('Thêm mới thành công!');
        } else {
            toastr()->error('Thêm mới không thành công.');
        }
        return redirect()->route('admin.discounts.index');
    }

    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view('admin.discounts.edit', compact('discount'));
    }

    public function update(DiscountUpdateRequest $request, $id)
    {
        $discount = Discount::findOrFail($id);
        $updated = $discount->update($request->validated() + ['status' => $request->status]);

        if ($updated) {
            toastr()->success('Cập nhật thành công!');
        } else {
            toastr()->error('Cập nhật không thành công.');
        }
        return redirect()->route('admin.discounts.index');
    }

    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        toastr()->success('Xóa thành công!');
        return redirect()->route('admin.discounts.index');
    }

    public function restore($id)
    {
        $discount = Discount::onlyTrashed()->findOrFail($id);
        $discount->restore();

        toastr()->success('Khôi phục thành công!');
        return redirect()->route('admin.discounts.index');
    }
}
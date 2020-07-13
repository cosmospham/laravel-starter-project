<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3><i class="fa fa-search"></i> {{ trans('dashboard.filter') }}</h3>
        </div>
        <div class="card-block">
            <form method="get">
                <div class="form-row">

                    <div class="col mb-3">
                        <label for="">{{ trans('dashboard.from-time')   }} - {{ trans('dashboard.to-time') }} ({{ trans('dashboard.date-format') }})</label>

                        <div id="reportrange"
                             style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa fa-caret-down"></i>
                            <input type="hidden" name="start_date" value="">
                            <input type="hidden" name="end_date" value="">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col mb-3">
                        <button class="btn btn-primary">{{ trans('dashboard.filter') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


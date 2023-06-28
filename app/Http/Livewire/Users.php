<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};
use OpenSpout\Writer\XLSX\Options;


final class Users extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped('#12rrrr')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\User>
     */
    public function datasource(): Builder
    {
        return User::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('firstname')

            /** Example of custom column using a closure **/
            ->addColumn('firstname_lower', fn (User $model) => strtolower(e($model->firstname)))

            ->addColumn('surname')
            ->addColumn('username')
            ->addColumn('email')
            ->addColumn('association_id')
            ->addColumn('date_of_birth')
            ->addColumn('gender')
            ->addColumn('tin')
            ->addColumn('company_name')
            ->addColumn('company_address')
            ->addColumn('profile_image')
            ->addColumn('primary_contact')
            ->addColumn('secondary_contact')
            ->addColumn('area_of_interests')
            ->addColumn('academic_qualification')
            ->addColumn('region_of_company')
            ->addColumn('role')
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Firstname', 'firstname')
                ->sortable()
                ->searchable(),

            Column::make('Surname', 'surname')
                ->sortable()
                ->searchable(),

            Column::make('Username', 'username')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Association id', 'association_id')
                ->sortable()
                ->searchable(),

            Column::make('Date of birth', 'date_of_birth')
                ->sortable()
                ->searchable(),

            Column::make('Gender', 'gender')
                ->sortable()
                ->searchable(),

            Column::make('Tin', 'tin')
                ->sortable()
                ->searchable(),

            Column::make('Company name', 'company_name')
                ->sortable()
                ->searchable(),

            Column::make('Company address', 'company_address')
                ->sortable()
                ->searchable(),

            Column::make('Profile image', 'profile_image')
                ->sortable()
                ->searchable(),

            Column::make('Primary contact', 'primary_contact')
                ->sortable()
                ->searchable(),

            Column::make('Secondary contact', 'secondary_contact')
                ->sortable()
                ->searchable(),

                Column::make('Area of interests', 'area_of_interests')
                ->sortable()
                ->searchable(),

            Column::make('Academic qualification', 'academic_qualification')
                ->sortable()
                ->searchable(),

            Column::make('Region of company', 'region_of_company')
                ->sortable()
                ->searchable(),

            Column::make('Role', 'role'),
            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            Filter::inputText('firstname')->operators(['contains']),
            Filter::inputText('surname')->operators(['contains']),
            Filter::inputText('username')->operators(['contains']),
            Filter::inputText('email')->operators(['contains']),
            Filter::inputText('association_id')->operators(['contains']),
            Filter::inputText('date_of_birth')->operators(['contains']),
            Filter::inputText('gender')->operators(['contains']),
            Filter::inputText('tin')->operators(['contains']),
            Filter::inputText('company_name')->operators(['contains']),
            Filter::inputText('company_address')->operators(['contains']),
            Filter::inputText('profile_image')->operators(['contains']),
            Filter::inputText('primary_contact')->operators(['contains']),
            Filter::inputText('secondary_contact')->operators(['contains']),
            Filter::inputText('area_of_interests')->operators(['contains']),
            Filter::inputText('academic_qualification')->operators(['contains']),
            Filter::inputText('region_of_company')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid User Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('edit', 'Edit')
                ->class('bg-green-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
                ->route('', function (\App\Models\User $model) {
                    return $model->id;
                }),

            Button::make('role', 'Role')
                ->class('bg-black-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
                ->route('', function (\App\Models\User $model) {
                    return $model->id;
                }),


            Button::make('reset', 'Reset')
                ->class('bg-yellow-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
                ->route('', function (\App\Models\User $model) {
                    return $model->id;
                }),


            Button::make('destroy', 'Suspend')
                ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
                ->route('', function (\App\Models\User $model) {
                    return $model->id;
                })
                ->method('delete')
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid User Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($user) => $user->id === 1)
                ->hide(),
        ];
    }
    */
}

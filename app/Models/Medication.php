<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Medication
 *
 * @property int $id
 * @property string $name
 * @property string|null $generic_name
 * @property string|null $brand_name
 * @property string|null $description
 * @property string $dosage_form
 * @property string $strength
 * @property string|null $ndc_number
 * @property string|null $manufacturer
 * @property float $unit_cost
 * @property float $selling_price
 * @property int $quantity_in_stock
 * @property int $reorder_level
 * @property int $reorder_quantity
 * @property \Illuminate\Support\Carbon|null $expiration_date
 * @property string|null $storage_requirements
 * @property bool $prescription_required
 * @property bool $controlled_substance
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read bool $needs_reorder
 * @property-read bool $is_expired
 * @property-read bool $expires_soon
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Medication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medication query()
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereBrandName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereControlledSubstance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereDosageForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereGenericName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereManufacturer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereNdcNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication wherePrescriptionRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereQuantityInStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereReorderLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereReorderQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereSellingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereStorageRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereStrength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereUnitCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication active()
 * @method static \Illuminate\Database\Eloquent\Builder|Medication lowStock()
 * @method static \Illuminate\Database\Eloquent\Builder|Medication expiringSoon()
 * @method static \Database\Factories\MedicationFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Medication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'generic_name',
        'brand_name',
        'description',
        'dosage_form',
        'strength',
        'ndc_number',
        'manufacturer',
        'unit_cost',
        'selling_price',
        'quantity_in_stock',
        'reorder_level',
        'reorder_quantity',
        'expiration_date',
        'storage_requirements',
        'prescription_required',
        'controlled_substance',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'unit_cost' => 'decimal:2',
        'selling_price' => 'decimal:2',
        'quantity_in_stock' => 'integer',
        'reorder_level' => 'integer',
        'reorder_quantity' => 'integer',
        'expiration_date' => 'date',
        'prescription_required' => 'boolean',
        'controlled_substance' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Check if medication needs to be reordered.
     *
     * @return bool
     */
    protected function getNeedsReorderAttribute(): bool
    {
        return $this->quantity_in_stock <= $this->reorder_level;
    }

    /**
     * Check if medication is expired.
     *
     * @return bool
     */
    protected function getIsExpiredAttribute(): bool
    {
        return $this->expiration_date && $this->expiration_date->isPast();
    }

    /**
     * Check if medication expires within 30 days.
     *
     * @return bool
     */
    protected function getExpiresSoonAttribute(): bool
    {
        return $this->expiration_date && $this->expiration_date->diffInDays(now()) <= 30;
    }

    /**
     * Scope a query to only include active medications.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include medications with low stock.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLowStock($query)
    {
        return $query->whereColumn('quantity_in_stock', '<=', 'reorder_level');
    }

    /**
     * Scope a query to only include medications expiring soon.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExpiringSoon($query)
    {
        return $query->whereDate('expiration_date', '<=', now()->addDays(30));
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'id';
    }
}
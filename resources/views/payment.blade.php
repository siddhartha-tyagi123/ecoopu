<style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
}

/* Container for the plans section */
.plans__container {
    padding: 10px;
    background-color: #f9f9f9;
}

/* Hero Section */
.plansHero {
    text-align: center;
    margin-bottom: 30px;
}

.plansHero__title {
    font-size: 2em;
    color: #333;
    margin: 0;
}

.plansHero__subtitle {
    font-size: 1.2em;
    color: #666;
    margin-top: 10px;
}

/* Plan Items Container */
.planItem__container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

/* Individual Plan Item */
.planItem {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 300px;
    text-align: center;
    padding: 10px;
    transition: box-shadow 0.3s ease;
}

.planItem:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Card Elements */
.card {
    margin-bottom: 20px;
}

.card__header {
    background: #007bff;
    color: #fff;
    padding: 15px;
    border-radius: 10px 10px 0 0;
}

.card__icon {
    display: inline-block;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #fff;
    margin-bottom: 10px;
}

.card__desc {
    margin: 10px 0;
    font-size: 1em;
    color: #666;
}

/* Price Styling */
.price {
    font-size: 2em;
    color: #333;
    margin: 10px 0;
}

.price b {
    font-size: 2.5em;
}

.duration {
    font-size: 1.2em;
    color: #333;
}

.orderlist {
    font-size: 1em;
    color: #666;
    margin: 10px 0;
}

/* Feature List */
.featureList {
    margin-bottom: 20px;
    text-align: left;
}

/* Button */
.button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #0056b3;
}

</style>
<section class="plans__container">
    <div class="plans">
        <div class="plansHero">
            <h1 class="plansHero__title">Simple, Transparent Pricing</h1>
            <p class="plansHero__subtitle">No Contracts. No Surprise Fees.</p>
        </div>
        <div class="planItem__container">
            @foreach($plans as $plan)
          @if(auth()->user()->role == 2 || $plan->role == NULL)
            <div class="planItem planItem--free">
                <div class="card">
                    <div class="card__header">
                        <div class="card__icon symbol symbol--rounded"></div>
                        <h2>{{ $plan->name }}</h2>
                    </div>
                </div>
                <div class="price">
                    <b>$</b>{{ $plan->price }}
                    <span></span>
                </div>
                <div class="duration">
                    <b>{{ $plan->days }}</b> days
                </div>
                <div class="orderlist">
                    <b>Order List:</b> {{ $plan->orderlist }}
                </div>
                <div class="featureList">
                    {!! $plan->description !!}
                </div>
                 @if($plan->days <= 14)
                <a href="{{ route('plans.show', $plan->slug) }}" class="btn btn-primary pull-right">Get Started</a>
                 @elseif(auth()->user()->role == 2)
                 <a href="{{ route('shop.owner.dashboard', $plan->slug) }}" class="btn btn-primary pull-right">Get Started</a>
                 @else
                 <a href="{{ route('customer.dashboard', $plan->slug) }}" class="btn btn-primary pull-right">Get Started</a>
                 @endif
            </div>
          @endif
            @endforeach
        </div>
    </div>
</section>
<!-- <script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.button').forEach(button => {
        button.addEventListener('click', () => {
            var duration = parseInt(button.getAttribute('data-duration'), 10);
            var planId = button.getAttribute('data-id');
            if (duration <= 14) {
                window.location.href = `/plans/${planId}`;
            } else if (duration <= 30) {
                window.location.href = 'shop/owner/dashboard';
            } else {
                console.error('Unexpected duration value:', duration);
            }
        });
    });
});
</script> -->


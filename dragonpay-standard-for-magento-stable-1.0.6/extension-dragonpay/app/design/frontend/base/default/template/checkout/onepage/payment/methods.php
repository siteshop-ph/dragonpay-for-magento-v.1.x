<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    design
 * @package     base_default
 * @copyright   Copyright (c) 2006-2016 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
?>
<?php
/**
 * One page checkout payment methods
 *
 * @var $this Mage_Checkout_Block_Onepage_Payment_Methods
 */
?>

<?php
    $methods = $this->getMethods();
    $oneMethod = count($methods) <= 1;
?>
<?php if (empty($methods)): ?>
    <dt>
        <?php echo $this->__('No Payment Methods') ?>
    </dt>
<?php else:
    foreach ($methods as $_method):
        $_code = $_method->getCode();
?>
    <dt id="dt_method_<?php echo $_code ?>">
    <?php if(!$oneMethod): ?>
    
   
   
    
                 <?php if($_code=='dragonpay' OR $_code=='dragonpaymicropayments'): ?>    
                                 <input id="p_method_<?php echo $_code ?>" value="<?php echo $_code ?>" type="radio" name="payment[method]" title="<?php echo $this->escapeHtml($_method->getTitle()) ?>" onclick="payment.switchMethod('<?php echo $_code ?>')"<?php if($this->getSelectedMethodCode()==$_code): ?> <?php endif; ?> class="radio"  checked  />
                  <?php else: ?>
                                 <input id="p_method_<?php echo $_code ?>" value="<?php echo $_code ?>" type="radio" name="payment[method]" title="<?php echo $this->escapeHtml($_method->getTitle()) ?>" onclick="payment.switchMethod('<?php echo $_code ?>')"<?php if($this->getSelectedMethodCode()==$_code): ?> <?php endif; ?> class="radio" />
                  <?php endif; ?>
  
  
  
  
  <?php else: ?>
        <span class="no-display"><input id="p_method_<?php echo $_code ?>" value="<?php echo $_code ?>" type="radio" name="payment[method]" checked="checked" class="radio" /></span>
        <?php $oneMethod = $_code; ?>
    <?php endif; ?>
        <label for="p_method_<?php echo $_code ?>"><?php echo $this->escapeHtml($this->getMethodTitle($_method)) ?> <?php echo $this->getMethodLabelAfterHtml($_method) ?></label>
    </dt>
    <?php if ($html = $this->getPaymentMethodFormHtml($_method)): ?>
    <dd id="dd_method_<?php echo $_code ?>">
        <?php echo $html; ?>
    </dd>
    <?php endif; ?>
<?php endforeach;
    endif;
?>

<?php echo $this->getChildChildHtml('additional'); ?>

<script type="text/javascript">
    //<![CDATA[
    <?php echo $this->getChildChildHtml('scripts'); ?>
    payment.init();
    <?php if (is_string($oneMethod)): ?>
    payment.switchMethod('<?php echo $oneMethod ?>');
        <?php endif; ?>
    //]]>
</script>

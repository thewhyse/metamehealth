wp.domReady(() => {
  wp.blocks.registerBlockStyle('core/group', [
    {
      name: 'faq-item',
      label: 'FAQs Item',
    },
  ]);

  wp.blocks.registerBlockStyle('core/button', [
    {
      name: 'inactive',
      label: 'Inactive',
    },
    {
      name: 'short',
      label: 'Short',
    },
    {
      name: 'medium',
      label: 'Medium',
    },
    {
      name: 'wide',
      label: 'Wide',
    },
  ]);

  wp.blocks.registerBlockStyle('core/spacer', [
    {
      name: 'spacer-110',
      label: 'Spacer-110',
    },
    {
      name: 'spacer-125',
      label: 'Spacer-125',
    },
  ]);

  wp.blocks.registerBlockStyle('core/paragraph', [
    {
      name: 'narrow',
      label: 'Narrow',
    },
    {
      name: 'border-bottom',
      label: 'Border Bottom',
    },
  ]);

  wp.blocks.registerBlockStyle('core/separator', [
    {
      name: 'gray-separator',
      label: 'Gray Line',
    },
  ]);

  // wp.blocks.registerBlockStyle('core/cover', [
  //   {
  //     name: 'text-left-with-overlay',
  //     label: 'Text on the Left',
  //   },
  // ]);
  //
  wp.blocks.registerBlockStyle('core/image', [
    {
      name: 'absolute-to-bottom',
      label: 'Overlay to top',
    },
    {
      name: 'right-bottom-shift',
      label: 'Bottom Shift',
    },
    {
      name: 'icon-with-text',
      label: 'Icon With Text',
    },
    {
      name: 'icon-with-text wide',
      label: 'Icon With Text Wide',
    },
    {
      name: 'bio',
      label: 'Photo for Bio',
    },
  ]);
  
  wp.blocks.registerBlockStyle('core/list', [
    {
      name: 'with-icon',
      label: 'With Icon',
    },
  ]);
  
  wp.blocks.registerBlockStyle('core/media-text', [
    {
      name: 'rounded-image',
      label: 'Rounded Image on the Edge',
    },
  ]);
});

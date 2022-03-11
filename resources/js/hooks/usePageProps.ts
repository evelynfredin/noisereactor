import { Page } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-react';

export function usePageProps<Props = {}>() {
  const page = usePage() as unknown as Page<Props & SharedProps>;

  return page.props;
}

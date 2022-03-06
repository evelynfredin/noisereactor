import { formatDistance, parseISO } from 'date-fns';

export const diffForHumans = (date: string) => {
  return `Added ${formatDistance(new Date(), parseISO(date))} ago.`;
};
